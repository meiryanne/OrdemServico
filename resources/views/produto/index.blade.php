@extends('templates.base')

@section('PageTitle')
    Produtos
@endsection

@section('Title')
    Produtos
@endsection

@section('Subtitle')
    Gerenciamento de Produtos
@endsection

@section('SearchForm')
    @searchForm(nome,Nome,produto.index)
@endsection

@section('Button')
    <form method="get" action="{{ route('produto.getCreate') }}">
        <button type="submit" class="btn btn-flat bg-green"><i class="fa fa-plus"></i> Adicionar Produto</button>
    </form>
@endsection

@section('Content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 70px;">@orderButton(order-link,cod_ps,#ID)</th>
                                <th>@orderButton(order-link,nome,Nome)</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Definição</th>
                                <th style="width: 250px;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->cod_ps }}</td>
                                    <td>{{ $produto->nome}}</td>
                                    <td>{{ $produto->descricao}}</td>
                                    <td>{{ $produto->preco}}</td>
                                    @if($produto->definicao == 'servico')
                                        <td>Serviço</td>
                                    @else
                                        <td>Produto</td>
                                    @endif
                                        <td class="form-inline">
                                        <div class="form-group">
                                            <form method="get"
                                                  action="{{ route('produto.getEdit', ['id' => $produto->cod_ps]) }}"
                                                  role="form"
                                                  id="form-edit">
                                                <button type="submit" class="btn bg-green btn-sm">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </button>
                                            </form>
                                        </div>
                                        <div class="form-group">
                                            <form method="post"
                                                  action="{{ route('produto.delete') }}"
                                                  role="form"
                                                  id="form-delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id"
                                                       value="{{ $produto->cod_ps }}">
                                                <button type="submit" class="btn bg-red btn-sm">
                                                    <i class="fa fa-trash-o"></i> Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection

@section('Paginate')
    {{ $produtos->render() }}
@endsection

