<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('nome', 'Nome*', ['class' => 'control-label']) !!}
        {!! Form::text('nome', old('nome'), ['class' => 'form-control', 'required','placeholder'=>'Ex: João Oliveira'] ) !!}
    </div>
</div>
<div class="divider"></div>
<div class="row">
    <div class="col-md-2 pull-right">
        <button type="submit" class="btn btn-block btn-success btn">Salvar</button>
    </div>
</div>


