<?php

namespace App\Http\Controllers;

use App\Repositories\OrcamentoRepository;
use Illuminate\Http\Request;
use Auth;

class OrcamentoController extends Controller
{

    private $orcamentoRepository;

    /**
     * Create a new controller instance.
     */
    public function __construct(OrcamentoRepository $orcamentoRepository)
    {
        $this->middleware('auth');
        $this->orcamentoRepository = $orcamentoRepository;
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
        return view('produto.create');
    }

    /**
     * Cria um novo cliente no banco
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function postCreate(Request $request)
    {
        try {
            $this->produtoServicoRepository->create($request->all());
            return redirect(route('produto.index'));

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
            return view('produto.edit',[
                'produto' => $this->produtoServicoRepository->find($id)
            ]);
        } catch (\Exception $e){
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back();
        }
    }

    public function putEdit($id, Request $request)
    {
        try {
            $data = $request->only($this->produtoServicoRepository->getFillableModelFields());
            $this->produtoServicoRepository->update($data, $id);
            return redirect(route('produto.index'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back()->withInput($request->all());
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
                $this->produtoServicoRepository->delete($request->get('id'));
                return redirect(route('produto.index'));
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
