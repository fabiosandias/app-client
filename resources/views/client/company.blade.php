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
                            <h2>Lista de clientes PJ</h2>
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
                                        <th class="column-title">Razão social </th>
                                        <th class="column-title">CNPJ </th>
                                        <th class="column-title">Inscição Estadual. </th>
                                        <th class="column-title">Responsável</th>
                                        <th class="column-title no-link last" style="width: 120px"><span class="nobr">Ação</span>
                                        </th>

                                    </tr>
                                    </thead>

                                    <tbody>


                                    @foreach($clients as $client)
                                        <tr class="even pointer">
                                            <td class="a-center ">{{ $client->type }}</td>
                                            <td class=" ">{{ $client->legal_name }}</td>
                                            <td class=" ">{{ $client->cnpj }}</td>
                                            <td class=" ">{{ $client->state_registration }}</td>
                                            <td class=" ">{{ $client->responsible_name }}</td>
                                            <td class=" last">
                                                <div class="btn-group  btn-group-sm">
                                                    <a class="btn btn-success btn-xs" title="Ver detalhe do cliente" href="{{route('client.detail', $client->id)}}"><i class="fa fa-list-alt"></i></a>
                                                    <button class="btn btn-success btn-xs delete_client" type="button"data-id="{{ $client->id }}" title="Deletar Cliente"><i class="fa fa-trash-o"></i></button>
                                                    <button class="btn btn-success btn-xs edit_client_company" data-url="{{route('client.get', $client->id)}}" title="Editar dados do cliente" type="button"><i class="fa fa-edit"></i></button>
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





    {{--modal para editar cliente--}}
    <div class="modal fade" id="editClienteCompanyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar cliente pessoa jurídica</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="form_client_edit_company" id="form_client_edit_company" class="form-horizontal">
                        {{ csrf_field() }}


                        <div class="col-lg-12">


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
@endsection
