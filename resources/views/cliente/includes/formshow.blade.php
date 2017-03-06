<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('nome', 'Nome*', ['class' => 'control-label']) !!}
        {!! Form::text('nome', $cliente['nome'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: João Oliveira'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
        {!! Form::text('email', $cliente['email'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: joao@email.com'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('tipoemail', 'Tipo de Email*', ['class' => 'control-label']) !!}
        {!! Form::select('tipoemail', ['comercial' => 'Comercial', 'particular' => 'Particular'], $cliente['tipoemail'], ['class' => 'form-control', 'required', 'disabled'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('tipologradouro', 'Logradouro*', ['class' => 'control-label']) !!}
        {!! Form::select('tipologradouro', $tiposlogradouro, $cliente['tipologradouro'], ['class' => 'form-control', 'required', 'disabled'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('logradouro', 'Nome*', ['class' => 'control-label']) !!}
        {!! Form::text('logradouro', $cliente['logradouro'], ['class' => 'form-control', 'required', 'disabled', 'placeholder'=>'Ex: Rua Caxias'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('numero', 'Número*', ['class' => 'control-label']) !!}
        {!! Form::text('numero', $cliente['numero'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: 15A'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        {!! Form::label('complemento', 'Complemento*', ['class' => 'control-label']) !!}
        {!! Form::text('complemento', $cliente['complemento'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: Próximo à Uema']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('tipoendereco', 'Tipo de Endereço*', ['class' => 'control-label']) !!}
        {!! Form::select('tipoendereco', ['comercial' => 'Comercial', 'particular' => 'Particular'], $cliente['tipoendereco'], ['class' => 'form-control', 'required', 'disabled'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('bairro', 'Bairro*', ['class' => 'control-label']) !!}
        {!! Form::text('bairro', $cliente['bairro'], ['class' => 'form-control', 'required', 'disabled', 'placeholder'=>'Ex: Cidade Operária'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('cidade', 'Cidade*', ['class' => 'control-label']) !!}
        {!! Form::text('cidade', $cliente['cidade'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: São Luís'] ) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('estado', 'Estado*', ['class' => 'control-label']) !!}
        {!! Form::select('estado', $estados, $cliente['estado'], ['class' => 'form-control', 'required', 'disabled'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('telefone', 'Telefone*', ['class' => 'control-label']) !!}
        {!! Form::text('telefone', $cliente['telefone'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: (98) 12345-6789', 'size' => 10]) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('descricaotelefone', 'Descrição do Telefone', ['class' => 'control-label']) !!}
        {!! Form::text('descricaotelefone', $cliente['descricaotelefone'], ['class' => 'form-control', 'placeholder'=>'Ex: Ligar em horário comercial', 'disabled']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('tipotelefone', 'Tipo de Telefone*', ['class' => 'control-label']) !!}
        {!! Form::select('tipotelefone', ['celular' => 'Celular', 'fixo' => 'Fixo'], $cliente['tipotelefone'], ['class' => 'form-control', 'required', 'disabled'] ) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        {!! Form::label('tipopessoa', 'Pessoa Jurídica ?', ['class' => 'control-label']) !!}
        {!! Form::select('tipopessoa', [ true => 'Sim', false => 'Não'], 0, ['class' => 'form-control', 'required', 'disabled'] ) !!}
    </div>
    <div class="dinamic-form">
        @if($cliente['tipopessoa'] == 0)
            <div class="form-group col-md-6">
                {!! Form::label('rg', 'RG*', ['class' => 'control-label']) !!}
                {!! Form::text('rg', $cliente['rg'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: 012345678910-0', 'size'=>'13']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('cpf', 'CPF*', ['class' => 'control-label']) !!}
                {!! Form::text('cpf', $cliente['cpf'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: 123.456.789-10', 'size'=>'11']) !!}
            </div>
        @else
            <div class="form-group col-md-9">
                {!! Form::label('inscricaoestadual', 'Inscrição Estadual*', ['class' => 'control-label']) !!}
                {!! Form::text('inscricaoestadual', $cliente['inscricaoestadual'], ['class' => 'form-control', 'required', 'disabled','placeholder'=>'Ex: 12174303-9', 'size'=>'13']) !!}
            </div>
        @endif
    </div>
</div>
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('[name=cpf]').mask('000.000.000-00');
            $('[name=rg]').mask('000000000000-0');
            $('[name=inscricaoestadual]').mask('00000000-0');
            $('[name=telefone]').mask('(00) 00000-0000');
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js"></script>
@endsection
