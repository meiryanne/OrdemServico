@extends('templates.base')

@section('PageTitle')
    Cadastro de Orçamento
@endsection

@section('Title')
    Orçamento
@endsection

@section('Subtitle')
    Cadastro de novo orçamento
@endsection

@section('Content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Novo Orçamento</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="container-fluid">
                {!! Form::open(['url' => route('orcamento.postCreate'), 'method' => 'post']) !!}
                @include('orcamento.includes.form')
                {!! Form::close() !!}
            </div>
        </div><!-- /.box-body -->
    </div>
@endsection