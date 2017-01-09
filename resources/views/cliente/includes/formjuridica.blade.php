<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('nome', 'Nome*', ['class' => 'control-label']) !!}
        {!! Form::text('nome', old('nome'), ['class' => 'form-control', 'required','placeholder'=>'Ex: João Oliveira'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
        {!! Form::text('email', old('email'), ['class' => 'form-control', 'required','placeholder'=>'Ex: joao@email.com'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('tipoemail', 'Tipo de Email*', ['class' => 'control-label']) !!}
        {!! Form::select('tipoemail', ['comercial' => 'Comercial', 'particular' => 'Particular'], old('tipoemail'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('tipologradouro', 'Logradouro*', ['class' => 'control-label']) !!}
        {!! Form::select('tipologradouro', $tiposlogradouro, old('tipologradouro'), ['class' => 'form-control', 'required'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('logradouro', 'Nome*', ['class' => 'control-label']) !!}
        {!! Form::text('logradouro', old('logradouro'), ['class' => 'form-control', 'required', 'placeholder'=>'Ex: Rua Caxias'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('numero', 'Número*', ['class' => 'control-label']) !!}
        {!! Form::text('numero', old('numero'), ['class' => 'form-control', 'required','placeholder'=>'Ex: 15A'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        {!! Form::label('complemento', 'Complemento*', ['class' => 'control-label']) !!}
        {!! Form::text('complemento', old('complemento'), ['class' => 'form-control', 'required','placeholder'=>'Ex: Próximo à Uema']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('tipoendereco', 'Tipo de Endereço*', ['class' => 'control-label']) !!}
        {!! Form::select('tipoendereco', ['comercial' => 'Comercial', 'particular' => 'Particular'], old('tipoendereco'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('bairro', 'Bairro*', ['class' => 'control-label']) !!}
        {!! Form::text('bairro', old('bairro'), ['class' => 'form-control', 'required', 'placeholder'=>'Ex: Cidade Operária'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('cidade', 'Cidade*', ['class' => 'control-label']) !!}
        {!! Form::text('cidade', old('cidade'), ['class' => 'form-control', 'required','placeholder'=>'Ex: São Luís'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('estado', 'Estado*', ['class' => 'control-label']) !!}
        {!! Form::select('estado', $estados, old('estado'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('telefone', 'Telefone*', ['class' => 'control-label']) !!}
        {!! Form::text('telefone', old('telefone'), ['class' => 'form-control', 'required','placeholder'=>'Ex: (98) 12345-6789', 'size' => 10]) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('descricaotelefone', 'Descrição do Telefone', ['class' => 'control-label']) !!}
        {!! Form::text('descricaotelefone', old('descricaotelefone'), ['class' => 'form-control', 'placeholder'=>'Ex: Ligar em horário comercial']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('tipotelefone', 'Tipo de Telefone*', ['class' => 'control-label']) !!}
        {!! Form::select('tipotelefone', ['celular' => 'Celular', 'fixo' => 'Fixo'], old('tipotelefone'), ['class' => 'form-control', 'required'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        {!! Form::label('tipopessoa', 'Pessoa Jurídica ?', ['class' => 'control-label']) !!}
        {!! Form::select('tipopessoa', [ true => 'Sim', false => 'Não'], 0, ['class' => 'form-control', 'required'] ) !!}
    </div>
    <div class="dinamic-form">
    </div>
</div>
<div class="divider"></div>
<div class="row">
    <div class="col-md-2 pull-right">
        <button type="submit" class="btn btn-block btn-success btn">Salvar</button>
    </div>
</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('[name=cpf]').mask('000.000.000-00');
            $('[name=rg]').mask('000000000000-0');
            $('[name=inscricaoestadual]').mask('00000000-0');
            $('[name=telefone]').mask('(00) 00000-0000');

            $('#tipopessoa').on('change', function () {

                if($(this).val() == 1){
                    $('.dinamic-form').empty();
                    $('.dinamic-form').append('' +
                        '<div class="form-group col-md-9">' +
                        '<label for="inscricaoestadual" class="control-label">' +
                        'Inscrição Estadual*' +
                        '</label>' +
                        '<input class="form-control" ' +
                        'required="required" ' +
                        'placeholder="Ex: 12174303-9" ' +
                        'name="inscricaoestadual"' +
                        'type="text" ' +
                        'size="9"' +
                        'id="inscricaoestadual">' +
                        '</div>');
                    return;
                }

                $('.dinamic-form').empty();
                $('.dinamic-form').append('' +
                    '<div class="form-group col-md-6">' +
                    '<label for="rg" class="control-label">RG*</label>' +
                    '<input class="form-control" ' +
                    'required="required" ' +
                    'placeholder="Ex: 012345678910-0" ' +
                    'name="rg" ' +
                    'type="text" ' +
                    'size="13"' +
                    'id="rg">'+
                    '</div> ');

                $('.dinamic-form').append('' +
                    '<div class="form-group col-md-3">' +
                    '<label for="cpf" class="control-label">CPF*</label>' +
                    '<input class="form-control" ' +
                    'required="required" ' +
                    'placeholder="Ex: 123.456.789-10" ' +
                    'name="cpf" ' +
                    'type="text"  ' +
                    'size="11"' +
                    'id="cpf">' +
                    '</div>');
            })
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js"></script>
@endsection