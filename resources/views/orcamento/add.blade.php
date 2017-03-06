@extends('templates.base')

@section('PageTitle')
    Adicionar itens ao Orçamento
@endsection

@section('Title')
    Adicionar itens
@endsection

@section('Subtitle')
    Adicionar itens ao orçamento
@endsection

@section('Content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Itens</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="container-fluid">
                {!! Form::open(['url' => route('orcamento.postAdd', ['id' => $id]), 'method' => 'post']) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('produto', 'Produto*', ['class' => 'control-label']) !!}
                        {!! Form::select('produto', $produtos, old('produto'), ['class' => 'form-control', 'required'] ) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('quantidade', 'Quantidade*', ['class' => 'control-label']) !!}
                        {!! Form::number('quantidade', old('quantidade'), ['class' => 'form-control', 'required', 'step' => 'any'] ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 pull-right">
                        <button type="submit" class="btn btn-block btn-success btn"><i class="fa fa-plus"></i> Adicionar </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div><!-- /.box-body -->
    </div>
@endsection