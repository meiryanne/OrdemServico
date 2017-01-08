@extends('templates.base')

@section('PageTitle')
    Clientes
@endsection

@section('Title')
    Clientes
@endsection

@section('Subtitle')
    Gerenciamento de Clientes
@endsection

@section('SearchForm')
    @searchForm(nome,Nome,cliente.index)
@endsection

@section('Button')
    <form method="get" action="{{ route('cliente.getCreate') }}">
        <button type="submit" class="btn btn-flat bg-green"><i class="fa fa-plus"></i> Adicionar Cliente</button>
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
                                <th style="width: 70px;">@orderButton(order-link,cod_cl,#ID)</th>
                                <th>@orderButton(order-link,nome,Nome)</th>
                                <th style="width: 250px;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->cod_cl }}</td>
                                    <td>{{ $cliente->nome}}</td>
                                    <td class="form-inline">
                                        <div class="form-group">
                                            <form method="get"
                                                  action="{{ route('cliente.getEdit', ['id' => $cliente->cod_cl]) }}"
                                                  role="form"
                                                  id="form-edit">
                                                <button type="submit" class="btn bg-green btn-sm">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </button>
                                            </form>
                                        </div>
                                        <div class="form-group">
                                            <form method="post"
                                                  action="{{ route('cliente.delete') }}"
                                                  role="form"
                                                  id="form-delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id"
                                                       value="{{ $cliente->cod_cl }}">
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
    {{ $clientes->render() }}
@endsection

