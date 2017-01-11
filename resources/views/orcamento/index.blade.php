@extends('templates.base')

@section('PageTitle')
    Orçamentos
@endsection

@section('Title')
    Orçamentos
@endsection

@section('Subtitle')
    Gerenciamento de Orçamentos
@endsection

@section('Button')
    <form method="get" action="{{ route('orcamento.getCreate') }}">
        <button type="submit" class="btn btn-flat bg-green"><i class="fa fa-plus"></i> Adicionar Orçamento</button>
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
                                <th style="width: 70px;">@orderButton(order-link,cod_or,#ID)</th>
                                <th>@orderButton(order-link,cliente,Cliente)</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <th style="width: 250px;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orcamentos as $orcamento)
                                <tr>
                                    <td>{{ $orcamento->cod_ps }}</td>
                                    <td class="form-inline">
                                        <div class="form-group">
                                            <form method="get"
                                                  action="{{ route('orcamento.getEdit', ['id' => $orcamento->cod_ps]) }}"
                                                  role="form"
                                                  id="form-edit">
                                                <button type="submit" class="btn bg-green btn-sm">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </button>
                                            </form>
                                        </div>
                                        <div class="form-group">
                                            <form method="post"
                                                  action="{{ route('orcamento.delete') }}"
                                                  role="form"
                                                  id="form-delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id"
                                                       value="{{ $orcamento->cod_ps }}">
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
    {{ $orcamentos->render() }}
@endsection

