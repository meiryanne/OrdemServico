@extends('templates.base')

@section('PageTitle')
    Cadastro de Produto
@endsection

@section('Title')
    Produto
@endsection

@section('Subtitle')
    Cadastro de novo produto
@endsection

@section('Content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Novo Produto</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="container-fluid">
                {!! Form::open(['url' => route('produto.postCreate'), 'method' => 'post']) !!}
                @include('produto.includes.form')
                {!! Form::close() !!}
            </div>
        </div><!-- /.box-body -->
    </div>
@endsection