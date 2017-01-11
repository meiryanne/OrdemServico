<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('nome', 'Produto*', ['class' => 'control-label']) !!}
        {!! Form::text('nome', old('nome'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('descricao', 'Descrição*', ['class' => 'control-label']) !!}
        {!! Form::text('descricao', old('descricao'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('preco', 'Preço*', ['class' => 'control-label']) !!}
        {!! Form::number('preco', old('preco'), ['class' => 'form-control', 'required', 'step' => 'any'] ) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('definicao', 'Definição*', ['class' => 'control-label']) !!}
        {!! Form::select('definicao', ['servico' => 'Serviço', 'produto' => 'Produto'], old('definicao'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-2 pull-right">
        <button type="submit" class="btn btn-block btn-success btn">Salvar</button>
    </div>
</div>
