@extends('templates.base')

@section('PageTitle')
    Home
@endsection

@section('Title')
    Estatísticas
@endsection

@section('Subtitle')
    Visão geral das Ordens de Serviços
@endsection

@section('Content')
    <div class="row">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-car"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Ordens de Serviço</span>
                    <span class="info-box-number"></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Clientes</span>
                    <span class="info-box-number"></span>

                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <!-- end row -->
@endsection