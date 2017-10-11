@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Clientes</h3>
                </div>

                {{--<div class="title_right">--}}
                    {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                            {{--<span class="input-group-btn">--}}
                      {{--<button class="btn btn-default" type="button">Go!</button>--}}
                    {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lista de clientes PF</h2>
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
                            <p class="text-muted font-13 m-b-30">
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{route('client.create')}}" class="btn btn-success pull-right" ><i class="fa fa-plus"></i> Novo Cliente</a>
                        </div>
                        <div class="x_content">


                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th> Tipo </th>
                                        <th class="column-title">Nome </th>
                                        <th class="column-title">Sobre Nome </th>
                                        <th class="column-title">Data de Nasc. </th>
                                        <th class="column-title">CPF </th>
                                        <th class="column-title no-link last" style="width: 120px"><span class="nobr">Ação</span>
                                        </th>

                                    </tr>
                                    </thead>

                                    <tbody>


                                        @foreach($clients as $client)
                                            <tr class="even pointer">
                                                <td class="a-center ">{{ $client->type }}</td>
                                                <td class=" ">{{ $client->first_name }}</td>
                                                <td class=" ">{{ $client->last_name }}</td>
                                                <td class=" ">{{ $client->date_birth }}</td>
                                                <td class=" ">{{ $client->cpf }}</td>
                                                <td class=" last">
                                                    <div class="btn-group  btn-group-sm">
                                                        <a class="btn btn-success btn-xs" title="Ver detalhe do cliente" href="{{route('client.detail', $client->id)}}"><i class="fa fa-list-alt"></i></a>
                                                        <button class="btn btn-success btn-xs delete_client" type="button"data-id="{{ $client->id }}" title="Deletar Cliente"><i class="fa fa-trash-o"></i></button>
                                                        <button class="btn btn-success btn-xs edit_client" data-url="{{route('client.get', $client->id)}}" title="Editar dados do cliente" type="button"><i class="fa fa-edit"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                                <div align="center">
                                    {!! $clients->links() !!}
                                </div>
                            </div>

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

{{--modal para editar cliente--}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar cliente pessoa física</h4>
                </div>
                <div class="modal-body">

                    <form method="POST" name="form_client_person_edit" id="form_client_person_edit" class="form-horizontal">
                        {{ csrf_field() }}


                        <div class="col-lg-12">


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="first_name">Nome <span class="required">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Entre com nome" name="first_name" id="first_name" class="form-control required first_name" aria-required="true">
                                    <input type="hidden" name="id" id="id" class="id">

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

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit"  class="btn btn-success">Salvar alteração</button>
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
{{--modal para editar cliente--}}
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
                                        <input type="text" placeholder="Entre com CPF" name="cpf" id="cpf" data-inputmask="'mask' : '999.999.999-99'"  class="form-control required cpf" aria-required="true">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="data_nascimento">Data de Nasc:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-inputmask="'mask' : '99/99/9999'"  placeholder="Data Nasc." id="date_birth" name="date_birth">
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
