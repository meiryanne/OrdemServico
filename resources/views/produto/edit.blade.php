@extends('templates.base')

@section('PageTitle')
    Edição de Produto
@endsection

@section('Title')
    Produto
@endsection

@section('Subtitle')
    Dados de produto
@endsection

@section('Content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Informações do produto</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="container-fluid">
                {!! Form::model($produto, ['url' => route('produto.putEdit', ['id' => $produto['cod_ps']]), 'method' => 'PUT']) !!}
                    @include('produto.includes.form')
                {!! Form::close() !!}
            </div>
        </div><!-- /.box-body -->
    </div>
@endsection
