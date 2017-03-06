<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepository;
use App\Repositories\ItemRepository;
use App\Repositories\OrcamentoRepository;
use App\Repositories\ProdutoServicoRepository;
use Illuminate\Http\Request;
use Auth;

class OrcamentoController extends Controller
{
    private $orcamentoRepository;
    private $clienteRepository;
    private $produtoServicoRepository;
    private $itemRepository;

    /**
     * Create a new controller instance.
     */
    public function __construct(OrcamentoRepository $orcamentoRepository,
                                ClienteRepository $clienteRepository,
                                ProdutoServicoRepository $produtoServicoRepository,
                                ItemRepository $itemRepository)
    {
        $this->middleware('auth');
        $this->orcamentoRepository = $orcamentoRepository;
        $this->clienteRepository = $clienteRepository;
        $this->produtoServicoRepository = $produtoServicoRepository;
        $this->itemRepository = $itemRepository;
    }

    /**
     * Index de Orcamento
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('orcamento.index', [
            'orcamentos' => $this->orcamentoRepository->paginateRequest($request->all())
        ]);
    }

    /**
     * Formulario de criacao
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view('orcamento.create', [
            'clientes' => $this->clienteRepository->lists('cod_cl', 'nome')
        ]);
    }

    /**
     * Cria um novo cliente no banco
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function postCreate(Request $request)
    {
        try {
            $date = new \DateTime('NOW');

            $orcamento = [
                'cod_cl' => $request->get('cliente'),
                'data' => $date->format('Y-m-d')
            ];

            $this->orcamentoRepository->create($orcamento);
            return redirect(route('orcamento.index'));
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back()->withInput($request->all());
        }
    }

    public function getEdit($id)
    {
        try {
            return view('produto.edit', [
                'produto' => $this->produtoServicoRepository->find($id)
            ]);
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back();
        }
    }

    public function getAdd($id)
    {
        try {
            $produtos = $this->produtoServicoRepository->lists('cod_ps', 'nome');
            return view('orcamento.add', [
                'produtos' => $produtos,
                'id' => $id
            ]);
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back();
        }
    }

    public function postAdd($id, Request $request)
    {
        try {
            $produtoId = $request->get('produto');
            $quantidade = $request->get('quantidade');

            $produto = $this->produtoServicoRepository->find($produtoId);

            $data = [
                'cod_or' => $id,
                'cod_ps' => $produtoId,
                'quantidade' => (int) $quantidade,
                'valor' => $produto->preco * (int) $quantidade,
            ];

            $item = $this->itemRepository->create($data);

            $orcamento = $this->orcamentoRepository->find($id);
            $this->orcamentoRepository->update([
                'valor' => $orcamento->valor + $data['valor']
            ], $id);

            return redirect(route('orcamento.index'));
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Exclui um registro de cliente no banco
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Request $request)
    {
        try {
            if ($request->get('id')) {
                $this->orcamentoRepository->delete($request->get('id'));
                return redirect(route('orcamento.index'));
            }

            return redirect()->back();
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back();
        }
    }
}
