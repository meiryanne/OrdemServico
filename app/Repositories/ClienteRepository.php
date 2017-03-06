<?php

namespace App\Repositories;

use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\Email;
use App\Models\Endereco;
use App\Models\Logradouro;
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;
use App\Models\Telefone;
use DB;

class ClienteRepository extends Repository
{
    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        $logradouroRepository = new LogradouroRepository(new Logradouro());
        $bairroRepository = new BairroRepository(new Bairro());
        $cidadeRepository = new CidadeRepository(new Cidade());
        $emailRepository  = new EmailRepository(new Email());
        $enderecoRepository = new EnderecoRepository(new Endereco());
        $telefoneRepository = new TelefoneRepository(new Telefone());
        $pessoaFisicaRepository = new PessoaFisicaRepository(new PessoaFisica());
        $pessoaJuridicaRepository = new PessoaJuridicaRepository(new PessoaJuridica());

        try {
            $cliente    = $this->model->create(array('nome' => $data['nome']));
            $logradouro = $logradouroRepository->create(array('descricao' => $data['logradouro']));
            $bairro     = $bairroRepository->create(array('descricao' => $data['bairro']));
            $cidade     = $cidadeRepository->create(array('cod_uf' => $data['estado'], 'nome' => $data['cidade']));

            $emailData  = [
                'cod_cl'    => $cliente->cod_cl,
                'endereco'  => $data['email'],
                'tipo'      => $data['tipoemail']
            ];

            $email      = $emailRepository->create($emailData);

            $enderecoData = [
                'cod_cl'        => $cliente->cod_cl,
                'cod_cd'        => $cidade->cod_cd,
                'cod_br'        => $bairro->cod_br,
                'cod_tl'        => $data['tipologradouro'],
                'cod_lg'        => $logradouro->cod_lg,
                'numero'        => $data['numero'],
                'complemento'   => $data['complemento'],
                'tipo_endereco' => $data['tipoendereco'],
            ];

            $endereco = $enderecoRepository->create($enderecoData);

            $telefoneData = [
                'cod_cl'    => $cliente->cod_cl,
                'descricao' => array_key_exists('descricaotelefone', $data) ? $data['descricaotelefone'] : 'H',
                'numero'    => $data['telefone'],
                'tipo'      => $data['tipotelefone'],
            ];

            $telefone = $telefoneRepository->create($telefoneData);


            if ($data['tipopessoa'] == 1) {
                $pessoaJuridicaData = [
                    'cod_cl'              => $cliente->cod_cl,
                    'inscricao_estadual'  => $data['inscricaoestadual'],
                ];

                $pessoaJuridica = $pessoaJuridicaRepository->create($pessoaJuridicaData);
                DB::commit();
                return;
            }

            $pessoaData = [
                'cod_cl' => $cliente->cod_cl,
                'cpf'    => $data['cpf'],
                'rg'     => $data['rg'],
            ];

            $pessoa = $pessoaFisicaRepository->create($pessoaData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            if (env('APP_DEBUG') == true) {
                throw $e;
            }
        }
    }
}
