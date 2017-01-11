@extends('templates.base')

@section('PageTitle')
    Edição de Cliente
@endsection

@section('Title')
    Cliente
@endsection

@section('Subtitle')
    Dados de cliente
@endsection

@section('Content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Informações do cliente</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="container-fluid">
                {!! Form::open(['url' => route('cliente.getView', ['id' => $cliente['cod_cl']]), 'method' => 'GET']) !!}
                    @include('cliente.includes.formedit')
                {!! Form::close() !!}
            </div>
        </div><!-- /.box-body -->
    </div>
@endsection
