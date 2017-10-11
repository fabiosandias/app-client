@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Cadastro de cliente</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Fomulário para cadastro de cliente</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <!-- Smart Wizard -->
                            <div id="wizard" class="form_wizard wizard_horizontal">
                                <ul class="wizard_steps">
                                    <li>
                                        <a href="#step-1">
                                            <span class="step_no">1</span>
                                            <span class="step_descr">
                                              1º passo<br />
                                              <small>Dados do cliente</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <span class="step_no">2</span>
                                            <span class="step_descr">
                                              2º passo<br />
                                              <small>Endereços</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <span class="step_no">3</span>
                                            <span class="step_descr">
                                              3º passo<br />
                                              <small>Telefones</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-4">
                                            <span class="step_no">4</span>
                                            <span class="step_descr">
                                              4º passo<br />
                                              <small>E-mails</small>
                                          </span>
                                        </a>
                                    </li>
                                </ul>
                                <form class="form-horizontal form-label-left" method="POST" name="form_client_person" id="form_client_person">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <div id="step-1">
                                    <h2 class="StepTitle">Passo 1 - Cadastro dos dados do cliente</h2>

                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="Company" id="company" name="type"> Pessoa Jurídica
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio"  value="Person" id="person" name="type"> Pessoa Física
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 box-person-juridica" style="display: none;">


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="legal_name">Razão social <span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" id="client_id" class="client_id">
                                                <input type="text" id="legal_name" name="legal_name" required="required" class="form-control ">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"  for="cnpj">CNPJ <span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" id="cnpj" name="cnpj" data-inputmask="'mask' : '99.999.999/9999-99'" required="required" class="form-control">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="state_registration" >Isnc Estadual<span class="required">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input id="state_registration" name="state_registration" class="date-picker form-control" required="required" type="text">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Responsável<span class="required">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input id="responsible_name" name="responsible_name" class="date-picker form-control" required="required" type="text">

                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-lg-12 box-person-fisica" style="display: none;">


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="first_name">Nome <span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="Entre com nome" name="first_name" id="first_name" class="form-control required first_name" aria-required="true">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="last_name">Sobrenome: <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="Entre com sobre nome" id="last_name" name="last_name" class="form-control required last_name" aria-required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="cpf" >CPF<span class="required">*</span>
                                            </label>
                                            <div class="col-sm-10">

                                                <input type="text" placeholder="Entre com CPF" name="cpf" data-inputmask="'mask' : '999.999.999-99'" id="cpf" class="form-control required cpf" aria-required="true">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="date_birth">Data de nasc.<span class="required">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="datepicker form-control date_birth" data-inputmask="'mask' : '9999-99-99'" placeholder="Data Nasc." id="date_birth" name="date_birth">

                                            </div>
                                        </div>

                                    </div>





                                </div>
                                <div id="step-2">
                                    <h2 class="StepTitle">Passo 2 - Cadastro de endereços</h2>

                                    <div class="clone-wrapper">
                                        <div class="toclone">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rua <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="street" name="street[]" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Número <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="number" name="number[]" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Complemento<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="complement" name="complement[]" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="district" name="district[]" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="city" name="city[]" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">UF<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="state" name="state[]" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="zip_code" name="zip_code[]" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                </div>
                                            </div>

                                            <div class="clone"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> </button></div>
                                            <div class="delete"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                                    <div id="step-3">
                                        <h2 class="StepTitle">Passo 3 - Cadastro de telefones</h2>

                                        <div class="clone-wrapper-phone">
                                            <div class="toclone">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefone <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="num_phone" name="num_phone[]" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>



                                                <div class="clone"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> </button></div>
                                                <div class="delete"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="step-4">
                                        <h2 class="StepTitle">Passo 4 - Cadastro de e-mails</h2>

                                        <div class="clone-wrapper-email">
                                            <div class="toclone">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="email" name="email[]" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>


                                                <div class="clone"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> </button></div>
                                                <div class="delete"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- End SmartWizard Content -->





                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastro de cliente pessoa física</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_person" id="form_client_person">
                        {{ csrf_field() }}
                        <div class="box-personal" style="display: block;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nome">Nome: <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Entre com nome" name="first_name[]" id="first_name" class="form-control required" aria-required="true">
                                        <input type="hidden" name="type"  id="type" value="Person">
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="sobre_nome">Sobre nome: <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Entre com sobre nome" id="last_name" name="last_name" class="form-control required" aria-required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="cpf">CPF: <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Entre com CPF" name="cpf" id="cpf" class="form-control required cpf" aria-required="true">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="data_nascimento">Data de Nasc:</label>
                                        <div class="input-group">
                                            <input type="text" class="datepicker form-control" placeholder="Data Nasc." id="date_birth" name="date_birth">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Cadastro de cliente pessoa física</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_person" id="form_client_person">
                        {{ csrf_field() }}
                        <div class="box-personal" style="display: block;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nome">Nome: <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Entre com nome" name="first_name" id="first_name" class="form-control required" aria-required="true">
                                        <input type="hidden" name="type"  id="type" value="Person">
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="sobre_nome">Sobre nome: <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Entre com sobre nome" id="last_name" name="last_name" class="form-control required" aria-required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="cpf">CPF: <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Entre com CPF" name="cpf" id="cpf" class="form-control required cpf" aria-required="true">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="data_nascimento">Data de Nasc:</label>
                                        <div class="input-group">
                                            <input type="text" class="datepicker form-control" placeholder="Data Nasc." id="date_birth" name="date_birth">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                </div>

            </div>
        </div>
    </div>
@endsection
