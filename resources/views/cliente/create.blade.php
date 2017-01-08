@extends('templates.base')

@section('PageTitle')
    Cadastro de Cliente
@endsection

@section('Title')
    Cliente
@endsection

@section('Subtitle')
    Cadastro de novo cliente
@endsection

@section('Content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nov0 Cliente</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="container-fluid">
                {!! Form::open(['url' => route('cliente.postCreate'), 'method' => 'post']) !!}
                @include('cliente.includes.form')
                {!! Form::close() !!}
            </div>
        </div><!-- /.box-body -->
    </div>
@endsection