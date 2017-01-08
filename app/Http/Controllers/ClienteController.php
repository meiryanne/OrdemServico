<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Repositories\ClienteRepository;
use App\Repositories\TipoLogradouroRepository;
use App\Repositories\UnidadeFederacaoRepository;
use Illuminate\Http\Request;
use Auth;

class ClienteController extends Controller
{
    private  $clienteRepository;
    private  $tipoLogradouroRepository;
    private  $unidadeFederacaoRepository;

    /**
     * Create a new controller instance.
     */
    public function __construct(ClienteRepository $clienteRepository,
                                TipoLogradouroRepository $tipoLogradouroRepository,
                                UnidadeFederacaoRepository $unidadeFederacaoRepository)
    {
        $this->middleware('auth');
        $this->clienteRepository = $clienteRepository;
        $this->tipoLogradouroRepository = $tipoLogradouroRepository;
        $this->unidadeFederacaoRepository = $unidadeFederacaoRepository;
    }

    /**
     * Index de Clientes
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('cliente.index', [
            'clientes' => $this->clienteRepository->paginateRequest($request->all())
        ]);
    }

    /**
     * Formulario de criacao
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view('cliente.create', [
            'tiposlogradouro' => $this->tipoLogradouroRepository->lists('cod_tl', 'descricao'),
            'estados' => $this->unidadeFederacaoRepository->lists('cod_uf', 'nome')
        ]);
    }

    /**
     * Cria um novo cliente no banco
     * @param ClienteRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function postCreate(ClienteRequest $request)
    {
        try {

            $this->clienteRepository->create($request->all());
            return redirect(route('cliente.index'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Retorna formulario de edicao de cliente
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Exception
     */
    public function getEdit($id)
    {
        try{
            $cliente = $this->clienteRepository->find($id);

            return view('cliente.edit', [
                'cliente' => $cliente,
                'tiposlogradouro' => $this->tipoLogradouroRepository->lists('cod_tl', 'descricao'),
                'estados' => $this->unidadeFederacaoRepository->lists('cod_uf', 'nome')
            ]);

        }  catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back();
        }
    }

    /**
     * Edita um registro de cliente no banco
     * @param $id
     * @param ClienteRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function putEdit($id, ClienteRequest $request)
    {
        try {

            $dados = $request->only($this->clienteRepository->getFillableModelFields());
            $this->clienteRepository->update($dados, $id);

            return redirect(route('cliente.index'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back();
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
                $this->clienteRepository->delete($request->get('id'));
                return redirect(route('cliente.index'));
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
