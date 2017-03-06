<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('cliente', 'Cliente*', ['class' => 'control-label']) !!}
        {!! Form::select('cliente', $clientes, old('cliente'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-2 pull-right">
        <button type="submit" class="btn btn-block btn-success btn">Salvar</button>
    </div>
</div>
