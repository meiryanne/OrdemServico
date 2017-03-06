<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Repositories\BairroRepository;
use App\Repositories\CidadeRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\EmailRepository;
use App\Repositories\EnderecoRepository;
use App\Repositories\LogradouroRepository;
use App\Repositories\PessoaFisicaRepository;
use App\Repositories\PessoaJuridicaRepository;
use App\Repositories\TelefoneRepository;
use App\Repositories\TipoLogradouroRepository;
use App\Repositories\UnidadeFederacaoRepository;
use Illuminate\Http\Request;
use Auth;

class ClienteController extends Controller
{
    private $clienteRepository;
    private $tipoLogradouroRepository;
    private $unidadeFederacaoRepository;
    private $enderecoRepository;
    private $bairroRepository;
    private $logradouroRepository;
    private $cidadeRepository;
    private $emailRepository;
    private $telefoneRepository;
    private $pessoaFisicaRepository;
    private $pessoaJuridicaRepository;

    /**
     * Create a new controller instance.
     */
    public function __construct(ClienteRepository $clienteRepository,
                                TipoLogradouroRepository $tipoLogradouroRepository,
                                UnidadeFederacaoRepository $unidadeFederacaoRepository,
                                EnderecoRepository $enderecoRepository,
                                BairroRepository $bairroRepository,
                                LogradouroRepository $logradouroRepository,
                                CidadeRepository $cidadeRepository,
                                EmailRepository $emailRepository,
                                TelefoneRepository $telefoneRepository,
                                PessoaFisicaRepository $pessoaFisicaRepository,
                                PessoaJuridicaRepository $pessoaJuridicaRepository)
    {
        $this->middleware('auth');
        $this->clienteRepository = $clienteRepository;
        $this->tipoLogradouroRepository = $tipoLogradouroRepository;
        $this->unidadeFederacaoRepository = $unidadeFederacaoRepository;
        $this->enderecoRepository = $enderecoRepository;
        $this->bairroRepository = $bairroRepository;
        $this->logradouroRepository = $logradouroRepository;
        $this->cidadeRepository = $cidadeRepository;
        $this->emailRepository = $emailRepository;
        $this->telefoneRepository = $telefoneRepository;
        $this->pessoaFisicaRepository = $pessoaFisicaRepository;
        $this->pessoaJuridicaRepository = $pessoaJuridicaRepository;
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
        try {
            $data = [];

            $cliente = $this->clienteRepository->find($id);

            $data['cod_cl'] = $cliente->cod_cl;
            $data['nome'] = $cliente->nome;

            $endereco = $this->enderecoRepository->find($id);

            $data['numero'] = $endereco->numero;
            $data['complemento'] = $endereco->complemento;
            $data['tipoendereco'] = $endereco->tipo_endereco;
            $data['tipologradouro'] = $endereco->cod_tl;

            $bairro = $this->bairroRepository->find($endereco->cod_br);

            $data['bairro'] = $bairro->descricao;

            $logradouro = $this->logradouroRepository->find($endereco->cod_lg);

            $data['logradouro'] = $logradouro->descricao;

            $cidade = $this->cidadeRepository->find($endereco->cod_cd);

            $data['estado'] = $cidade->cod_uf;
            $data['cidade'] = $cidade->nome;

            $email = $this->emailRepository->find($id);

            $data['email'] = $email->endereco;
            $data['tipoemail'] = $email->tipo;

            $telefone = $this->telefoneRepository->find($id);

            $data['telefone'] = $telefone->numero;
            $data['tipotelefone'] = $telefone->tipo;
            $data['descricaotelefone'] = $telefone->descricao;

            $pessoa = $this->pessoaFisicaRepository->find($id);

            if (is_null($pessoa)) {
                $pessoa = $this->pessoaJuridicaRepository->find($id);

                $data['inscricaoestadual'] = $pessoa->inscricao_estadual;
                $data['tipopessoa'] = 1;

                return view('cliente.edit', [
                    'cliente' => $data,
                    'tiposlogradouro' => $this->tipoLogradouroRepository->lists('cod_tl', 'descricao'),
                    'estados' => $this->unidadeFederacaoRepository->lists('cod_uf', 'nome')
                ]);
            }

            $data['rg'] = $pessoa->rg;
            $data['cpf'] = $pessoa->cpf;
            $data['tipopessoa'] = 0;

            return view('cliente.edit', [
                'cliente' => $data,
                'tiposlogradouro' => $this->tipoLogradouroRepository->lists('cod_tl', 'descricao'),
                'estados' => $this->unidadeFederacaoRepository->lists('cod_uf', 'nome')
            ]);
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                throw $e;
            }

            return redirect()->back();
        }
    }

    public function get($id)
    {
        try {
            $data = [];

            $cliente = $this->clienteRepository->find($id);

            $data['cod_cl'] = $cliente->cod_cl;
            $data['nome'] = $cliente->nome;

            $endereco = $this->enderecoRepository->find($id);

            $data['numero'] = $endereco->numero;
            $data['complemento'] = $endereco->complemento;
            $data['tipoendereco'] = $endereco->tipo_endereco;
            $data['tipologradouro'] = $endereco->cod_tl;

            $bairro = $this->bairroRepository->find($endereco->cod_br);

            $data['bairro'] = $bairro->descricao;

            $logradouro = $this->logradouroRepository->find($endereco->cod_lg);

            $data['logradouro'] = $logradouro->descricao;

            $cidade = $this->cidadeRepository->find($endereco->cod_cd);

            $data['estado'] = $cidade->cod_uf;
            $data['cidade'] = $cidade->nome;

            $email = $this->emailRepository->find($id);

            $data['email'] = $email->endereco;
            $data['tipoemail'] = $email->tipo;

            $telefone = $this->telefoneRepository->find($id);

            $data['telefone'] = $telefone->numero;
            $data['tipotelefone'] = $telefone->tipo;
            $data['descricaotelefone'] = $telefone->descricao;

            $pessoa = $this->pessoaFisicaRepository->find($id);

            if (is_null($pessoa)) {
                $pessoa = $this->pessoaJuridicaRepository->find($id);

                $data['inscricaoestadual'] = $pessoa->inscricao_estadual;
                $data['tipopessoa'] = 1;

                return view('cliente.show', [
                    'cliente' => $data,
                    'tiposlogradouro' => $this->tipoLogradouroRepository->lists('cod_tl', 'descricao'),
                    'estados' => $this->unidadeFederacaoRepository->lists('cod_uf', 'nome')
                ]);
            }

            $data['rg'] = $pessoa->rg;
            $data['cpf'] = $pessoa->cpf;
            $data['tipopessoa'] = 0;

            return view('cliente.show', [
                'cliente' => $data,
                'tiposlogradouro' => $this->tipoLogradouroRepository->lists('cod_tl', 'descricao'),
                'estados' => $this->unidadeFederacaoRepository->lists('cod_uf', 'nome')
            ]);
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
