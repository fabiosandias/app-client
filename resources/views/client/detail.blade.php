@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Detalhe do cliente</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <small>Detalhe do cliente <b>{{ $client->first_name }} {{$client->last_name}}</b></small>
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
                        <div class="col-lg-6">
                            @if($client->type == 'Person')
                                <h4><b>Nome: </b>{{ $client->first_name }} {{$client->last_name}}</h4>
                                <h4><b>Data de nascimento: </b>{{ $client->date_birth }}</h4>
                                <h4><b>CPF: </b>{{ $client->cpf }}</h4>
                            @else
                                <h4><b>Razão social: </b>{{ $client->legal_name }} {{$client->last_name}}</h4>
                                <h4><b>CNPJ: </b>{{ $client->cnpj }}</h4>
                                <h4><b>Isncrição estadual: </b>{{ $client->state_registration }}</h4>
                                <h4><b>Responsável: </b>{{ $client->responsible_name }}</h4>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('client.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo Cliente</a>
                        </div>
                        <div class="x_content">


                            <div class="table-responsive">
                                <div class="col-lg-6">
                                    <h5>Endereços</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <button type="button" class="btn btn-success btn-xs pull-right"data-toggle="modal" data-target="#modalAddAddress"><i class="fa fa-plus"></i> Novo</button>
                                    </div>
                                </div>
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th>Rua</th>
                                        <th class="column-title">Numero </th>
                                        <th class="column-title">Complemento </th>
                                        <th class="column-title">Bairro </th>
                                        <th class="column-title">Cidade </th>
                                        <th class="column-title">UF</th>
                                        <th class="column-title">CEP</th>
                                        <th class="column-title">Ação</th>

                                    </tr>
                                    </thead>

                                    <tbody>


                                    @foreach($client->addresses as $address)
                                    <tr class="even pointer">
                                    <td class="a-center ">{{ $address->street }}</td>
                                    <td class=" ">{{ $address->number }}</td>
                                    <td class=" ">{{ $address->complement }}</td>
                                    <td class=" ">{{ $address->district }}</td>
                                    <td class=" ">{{ $address->city }}</td>
                                    <td class=" ">{{ $address->state }}</td>
                                    <td class=" ">{{ $address->zip_code }}</td>
                                        <td class=" last" width="81">
                                            <div class="btn-group  btn-group-sm">
                                                <button class="btn btn-success btn-xs delete_address" type="button" data-id="{{ $address->address_id }}" title="Deletar endereço"><i class="fa fa-trash-o"></i></button>
                                                <button class="btn btn-success btn-xs edit_address" data-url="{{route('address.get', $address->address_id)}}" title="Editar endereço" type="button"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                                <div align="center">
                                    {{--{!! $clients->links() !!}--}}
                                </div>
                            </div>

                        </div>

                        <div class="x_content">


                            <div class="table-responsive">
                                <div class="col-lg-6">
                                    <h5>Emails</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <button type="button" class="btn btn-success btn-xs pull-right"data-toggle="modal" data-target="#modalAddEmail"><i class="fa fa-plus"></i> Novo</button>
                                    </div>
                                </div>
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th> E-mail </th>
                                        <th class="column-title no-link last"><span class="nobr">Ação</span>
                                        </th>

                                    </tr>
                                    </thead>

                                    <tbody>


                                    @foreach($client->addressEmails as $email)
                                    <tr class="even pointer">
                                    <td class="a-center ">{{ $email->email }}</td>
                                        <td class=" last" width="81">
                                            <div class="btn-group  btn-group-sm">
                                                <button class="btn btn-success btn-xs delete_email" type="button" data-id="{{ $email->address_email_id }}" title="Deletar e-mail"><i class="fa fa-trash-o"></i></button>
                                                <button class="btn btn-success btn-xs edit_email" data-url="{{route('email.get', $email->address_email_id)}}" title="Editar e-mail" type="button"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                                <div align="center">
                                    {{--{!! $clients->links() !!}--}}
                                </div>
                            </div>

                        </div>


                        <div class="x_content">


                            <div class="table-responsive">
                                <div class="col-lg-6">
                                    <h5>Telefones de contato</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <button type="button" class="btn btn-success btn-xs pull-right"data-toggle="modal" data-target="#modalAddPhone"><i class="fa fa-plus"></i> Novo</button>
                                    </div>
                                </div>
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th> Telefone </th>
                                        <th class="column-title no-link last"><span class="nobr">Ação</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    @foreach($client->phones as $phone)
                                        <tr class="even pointer">
                                            <td class="a-center ">{{ $phone->num_phone }}</td>
                                            <td class=" last" width="81">
                                                <div class="btn-group  btn-group-sm">
                                                    <button class="btn btn-success btn-xs delete_phone" type="button" data-id="{{ $phone->phone_id }}" title="Deletar Telefone"><i class="fa fa-trash-o"></i></button>
                                                    <button class="btn btn-success btn-xs edit_phone" data-url="{{route('phone.get', $phone->phone_id)}}" title="Editar número de telefone" type="button"><i class="fa fa-edit"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                                <div align="center">
                                    {{--{!! $clients->links() !!}--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="modalAddEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastro de e-mail</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_add_email" id="form_client_add_email">
                        {{ csrf_field() }}
                        <div class="box-personal" style="display: block;">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="nome">Email: <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" placeholder="Entre com o e-mail" name="email" id="email" class="form-control required" aria-required="true">
                                        <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}">
                                    </div>
                                    </div>








                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        <button type="submit" id="btn-create-email" class="btn btn-success">Salvar</button>
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

    <div class="modal fade" id="modalEditEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar de e-mail</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_edit_email" id="form_client_edit_email">
                        {{ csrf_field() }}
                        <div class="box-personal" style="display: block;">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="nome">Email: <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">

                                        <input type="text" placeholder="Entre com o e-mail" name="email" id="email" class="form-control required email" aria-required="true">
                                        <input type="hidden" name="client_id" id="client_email_id">
                                         </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        <button type="submit" id="btn-update-email" class="btn btn-success">Salvar alteração</button>
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


    {{--Telefone--}}
    <div class="modal fade" id="modalAddPhone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastro de telefone</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_add_phone" id="form_client_add_phone">
                        {{ csrf_field() }}
                        <div class="box-personal" style="display: block;">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="nome">Telefone: <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" placeholder="Entre com o número de telefone" data-inputmask="'mask' : '(99) 99999-9999'" name="num_phone" id="num_phone" class="form-control required" aria-required="true">
                                        <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}">
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        <button type="submit" id="btn-create-phone" class="btn btn-success">Salvar</button>
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

    <div class="modal fade" id="modalEditPhone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar de telefone</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_edit_phone" id="form_client_edit_phone">
                        {{ csrf_field() }}
                        <div class="box-personal" style="display: block;">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="nome">Telefone: <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" placeholder="Entre com o número de telefone" data-inputmask="'mask' : '(99) 99999-9999'" name="num_phone" id="num_phone" class="form-control required num_phone" aria-required="true">
                                        <input type="hidden" name="client_id" id="client_id_edit">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        <button type="submit" id="btn-update-phone" class="btn btn-success">Salvar</button>
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

    <div class="modal fade" id="modalAddAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastro de endereço</h4>
                </div>
                <div class="modal-body">

                    <form method="POST" name="form_client_create_address" id="form_client_create_address" class="form-horizontal">
                        {{ csrf_field() }}


                                <div class="col-lg-12">


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="street">Rua <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                        <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}">
                                            <input type="text" id="street" name="street" required="required" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"  for="last-name">Número <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="number" name="number" required="required" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Complemento<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="complement" name="complement" class="date-picker form-control" required="required" type="text">

                                         </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bairro<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="district" name="district" class="date-picker form-control" required="required" type="text">

                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cidade <span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="city" name="city" class="date-picker form-control" required="required" type="text">

                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">UF<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="state" name="state" class="date-picker form-control " required="required" type="text">

                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CEP<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="zip_code" data-inputmask="'mask' : '99999-999'" name="zip_code" class="date-picker form-control" required="required" type="text">

                                    </div>
                                    </div>
                                </div>






                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                            <button type="submit"  class="btn btn-success">Salvar</button>
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

    <div class="modal fade" id="modalEditAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar de endereço</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_edit_address" id="form_client_edit_address" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="box-personal" style="display: block;">
                            <div class="row">
                                <div class="col-lg-12">


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="street">Rua <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="address_id" id="client_address_id">
                                            <input type="text" id="street" name="street" required="required" class="form-control street">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"  for="last-name">Número <span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="number" name="number" required="required" class="form-control number">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Complemento<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="complement" name="complement" class="date-picker form-control complement" required="required" type="text">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bairro<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="district" name="district" class="date-picker form-control district" required="required" type="text">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cidade <span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="city" name="city" class="date-picker form-control city" required="required" type="text">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">UF<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="state" name="state" class="date-picker form-control state" required="required" type="text">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CEP<span class="required">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input id="zip_code" data-inputmask="'mask' : '99999-999'" name="zip_code" class="date-picker form-control zip_code" required="required" type="text">

                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" id="btn-update-address" class="btn btn-success">Salvar</button>
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
