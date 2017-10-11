/**
 * Created by fabio on 30/11/16.
 */
$(function () {

    var Client = {
        notification: function (title, text, type) {
            new PNotify({
                title: title,
                text: text,
                type: type,
                styling: 'bootstrap3'
            });
        },
        create: function (client) {
            $.ajax({
                url: 'save',
                dataType: "JSON",
                type: 'POST',
                data: client,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {
                        $('#myModal').modal('hide');
                        $('#form_client_person').trigger('reset');
                        $('.box-person-fisica').fadeIn(700).hide();
                        $('.box-person-juridica').fadeIn(700).hide();
                        Client.notification('Cadastro concluido!', 'O cadastro do cliente foi criado com sucesso.', 'success');
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }


            })
        },
        getClientId: function (url) {
            $.ajax({
                url: url,
                dataType: "JSON",
                type: 'GET',
                cache: false,
                success: function (data, textStatus) {
                    $('.id').val(data.id);
                    $('.first_name').val(data.first_name);
                    $('.last_name').val(data.last_name);
                    $('.cpf').val(data.cpf);
                    $('.date_birth').val(data.date_birth);
                    $('#editModal').modal('show');
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }


            })
        },
        getClientCompanyId: function (url) {
            $.ajax({
                url: url,
                dataType: "JSON",
                type: 'GET',
                cache: false,
                success: function (data, textStatus) {
                    $('#client_id').val(data.id);
                    $('#state_registration').val(data.state_registration);
                    $('#legal_name').val(data.legal_name);
                    $('#cnpj').val(data.cnpj);
                    $('#responsible_name').val(data.responsible_name);
                    $('#editClienteCompanyModal').modal('show');
                    
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }


            })
        },
        update: function (client, id) {
            $.ajax({
                url: 'update/' + id,
                dataType: "JSON",
                type: 'PUT',
                data: client,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {
                        $('#editModal').modal('hide');
                        $('#form_client_person_edit').trigger('reset');
                        Client.notification('Atualização concluido!', 'Os dados do cliente foi atualizado com sucesso.', 'success');
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        },2500);
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }


            })
        },
        remove: function (id) {
            swal({
                    title: "Você tem certeza?",
                    text: "Você está preste a deletar um usuário com todo seu contatos.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, estou certo disso!",
                    cancelButtonText: "Não, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: 'remove/' + id,
                            dataType: "JSON",
                            type: 'GET',
                            cache: false,
                            success: function (data, textStatus) {
                                if (data.status == 'OK') {
                                    swal("Cliente deletado!", "O cliente foi removido com sucesso", "success");
                                    setTimeout(function () {
                                        window.location.href = window.location.href;
                                    },3000);
                                }
                            },
                            error: function (xhr, er) {
                                Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                            }
                        })

                    } else {
                        swal("Cancelado", "A ação foi cancelada", "error");
                    }
                });
        },

        // Phone
        addPhoneClient: function (phone) {
            $.ajax({
                url: '/phone/create',
                dataType: "JSON",
                type: 'POST',
                data: phone,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {
                        $('#modalAddPhone').modal('hide');
                        $('#form_client_add_phone').trigger('reset');
                        Client.notification('Cadastro concluido!', 'O número de telefone foi salvo com sucesso.', 'success');
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        },2000);
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }


            })
        },
        getPhoneId: function (url) {
            $.get(
                url,
                function (data, textStatus) {
                    console.log(data[0].num_phone);
                    $('#client_id_edit').val(data[0].phone_id);
                    $('.num_phone').val(data[0].num_phone);
                    $('#modalEditPhone').modal('show');
                }, 'JSON'
            )
        },
        deletePhone: function (id) {
            swal({
                    title: "Você tem certeza?",
                    text: "Você está preste a deletar o telefone de contato.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, estou certo disso!",
                    cancelButtonText: "Não, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.get(
                            '/phone/remove/' + id,
                            function (data, textStatus) {
                                if (data.status == 'OK') {
                                    swal("Telefone deletado!", "O telefone foi removido com sucesso", "success");
                                    setTimeout(function () {
                                        window.location.href = window.location.href;
                                    },3000);
                                }
                            }, 'JSON'
                        )

                    } else {
                        swal("Cancelado", "A ação foi cancelada", "error");
                    }
                });

        },
        updatePhone: function (client, id) {
            $.ajax({
                url: '/phone/update/' + id,
                dataType: "JSON",
                type: 'PUT',
                data: client,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {

                        $('#modalEditPhone').modal('hide');
                        Client.notification('Atualização concluido!', 'Telefone atualizado com sucesso.', 'success');
                        $('#form_client_edit_phone').trigger('reset');
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        },2000);
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }
            })
        },

        // Email
        addEmailClient: function (email) {
            $.ajax({
                url: '/email/create',
                dataType: "JSON",
                type: 'POST',
                data: email,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {
                        $('#modalAddEmail').modal('hide');
                        $('#form_client_add_email').trigger('reset');
                        Client.notification('Cadastro concluido!', 'E-mail salvo com sucesso.', 'success');
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        },2000);
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }


            })
        },
        getEmailId: function (url) {
            $.get(
                url,
                function (data, textStatus) {
                    console.log(data[0].num_phone);
                    $('#client_email_id').val(data[0].address_email_id);
                    $('.email').val(data[0].email);
                    $('#modalEditEmail').modal('show');
                }, 'JSON'
            )
        },
        deleteEmail: function (id) {
            swal({
                    title: "Você tem certeza?",
                    text: "Você está preste a deletar esse e-mail.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, estou certo disso!",
                    cancelButtonText: "Não, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.get(
                            '/email/remove/' + id,
                            function (data, textStatus) {
                                if (data.status == 'OK') {
                                    swal("E-mail deletado!", "O e-mail foi removido com sucesso", "success");
                                    setTimeout(function () {
                                        window.location.href = window.location.href;
                                    },3000);
                                }
                            }, 'JSON'
                        )

                    } else {
                        swal("Cancelado", "A ação foi cancelada", "error");
                    }
                });

        },
        updateEmail: function (email, id) {
            $.ajax({
                url: '/email/update/' + id,
                dataType: "JSON",
                type: 'PUT',
                data: email,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {

                        $('#modalEditEmail').modal('hide');
                        Client.notification('Atualização concluido!', 'Email atualizado com sucesso.', 'success');
                        $('#form_client_edit_phone').trigger('reset');
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        },2000);
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }
            })
        },

        // Address
        addAddressClient: function (address) {
            $.ajax({
                url: '/address/create',
                dataType: "JSON",
                type: 'POST',
                data: address,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {
                        $('#modalAddAddress').modal('hide');
                        $('#form_client_create_address').trigger('reset');
                        Client.notification('Cadastro concluido!', 'Endereço salvo com sucesso.', 'success');
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        },2000);
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }


            })
        },
        getAddressId: function (url) {
            $.get(
                url,
                function (data, textStatus) {
                    $('#client_address_id').val(data[0].address_id);
                    $('.street').val(data[0].street);
                    $('.number').val(data[0].number);
                    $('.complement').val(data[0].complement);
                    $('.city').val(data[0].city);
                    $('.district').val(data[0].district);
                    $('.state').val(data[0].state);
                    $('.zip_code').val(data[0].zip_code);
                    $('#modalEditAddress').modal('show');
                }, 'JSON'
            )
        },
        deleteAddress: function (id) {
            swal({
                    title: "Você tem certeza?",
                    text: "Você está preste a deletar esse endereço.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, estou certo disso!",
                    cancelButtonText: "Não, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.get(
                            '/address/remove/' + id,
                            function (data, textStatus) {
                                if (data.status == 'OK') {
                                    swal("Endereço deletado!", "O endereço foi removido com sucesso", "success");
                                    setTimeout(function () {
                                        window.location.href = window.location.href;
                                    },3000);
                                }
                            }, 'JSON'
                        )

                    } else {
                        swal("Cancelado", "A ação foi cancelada", "error");
                    }
                });

        },
        updateAddress: function (address, id) {
            $.ajax({
                url: '/address/update/' + id,
                dataType: "JSON",
                type: 'PUT',
                data: address,
                cache: false,
                success: function (data, textStatus) {
                    if (data.status == 'OK') {

                        $('#modalEditAddress').modal('hide');
                        Client.notification('Atualização concluido!', 'Endereço atualizado com sucesso.', 'success');
                        $('#form_client_edit_address').trigger('reset');
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        },2000);
                    }
                },
                error: function (xhr, er) {
                    Client.notification('Algo de errado aconteceu!', 'Desculpe! Estamos passando por problemas técnicos. Tente novamente mais tarde, se o erro persistir contate o suporte.', 'error');
                }
            })
        },
    };

    $('#form_client_person').submit(function (e) {
        e.preventDefault();
        var client = $(this).serialize();
        Client.create(client);
    });

    function onFinishCallback() {
        $('#form_client_person').submit();
    }

    $('.edit_client').on('click', function () {
        Client.getClientId($(this).attr('data-url'));
    });

    // Preenche o formulario de pessoa juridica para editar
    $('.edit_client_company').on('click', function () {
        Client.getClientCompanyId($(this).attr('data-url'));
    });


    // Atualiza dados do cliente pf
    $('#form_client_person_edit').submit(function (e) {
        e.preventDefault();
        if($(this).valid()){
            var client = $(this).serialize();
            Client.update(client, $('.id').val());

        }

    });

    // Atualiza dados do cliente pj
    $('#form_client_edit_company').submit(function (e) {
        e.preventDefault();
        if($(this).valid()){
            var client = $(this).serialize();
            Client.update(client, $('.client_id').val());
            // window.location.href = window.location.href;
        }

    });

    $('.delete_client').on('click', function () {
        Client.remove($(this).attr('data-id'));

    });


    // Phone
    $('#form_client_add_phone').submit(function (e) {
        e.preventDefault();
        if($(this).valid()){
            var phone = $('#form_client_add_phone').serialize();
            Client.addPhoneClient(phone);
        }


    });

    $('.edit_phone').on('click', function () {
        Client.getPhoneId($(this).attr('data-url'));
    });

    $('.delete_phone').on('click', function () {
        Client.deletePhone($(this).attr('data-id'));
    });

    $('#form_client_edit_phone').submit(function (e) {
        e.preventDefault();
        if($(this).valid()) {
            var phone = $('#form_client_edit_phone').serialize();
            Client.updatePhone(phone, $('#client_id_edit').val());
        }
    });


    // Email
    $('#form_client_add_email').submit(function (e) {
        e.preventDefault();
        if($(this).valid()) {
            var email = $('#form_client_add_email').serialize();
            Client.addEmailClient(email);
        }

    });

    $('.edit_email').on('click', function () {
        Client.getEmailId($(this).attr('data-url'));
    });

    $('.delete_email').on('click', function () {
        Client.deleteEmail($(this).attr('data-id'));
    });

    $('#form_client_edit_email').submit(function (e) {
        e.preventDefault();
        if($(this).valid()) {
            var email = $('#form_client_edit_email').serialize();
            Client.updateEmail(email, $('#client_email_id').val());
        }
    });


    // Address
    $('#form_client_create_address').submit(function (e) {
        e.preventDefault();
        if($(this).valid()){
            var address = $('#form_client_create_address').serialize();
            Client.addAddressClient(address);
        }

    });

    $('.edit_address').on('click', function () {
        Client.getAddressId($(this).attr('data-url'));
    });

    $('.delete_address').on('click', function () {
        Client.deleteAddress($(this).attr('data-id'));
    });

    $('#form_client_edit_address').submit(function (e) {
        e.preventDefault();
        if($(this).valid()){
            var address = $('#form_client_edit_address').serialize();
            Client.updateAddress(address, $('#client_address_id').val());
        }

    });


    $('#wizard').smartWizard(
        {
            transitionEffect: 'slideleft',
            onFinish: onFinishCallback,
            enableFinishButton: true
        }
    );


    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');

    $(":input").inputmask();

    // validação de formulario de endereço
    $( "#form_client_create_address" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );

    $( "#form_client_edit_address" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );

    // validação de formulario de telefone
    $( "#form_client_add_phone" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );

    $( "#form_client_edit_phone" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );

    // validação de formulario de email
    $( "#form_client_add_email" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );

    $( "#form_client_edit_email" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );


    // VAlida form do modal editar cliente pj
    $( "#form_client_edit_company" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );
    // valida form do modal editar cliente pf
    $( "#form_client_person_edit" ).validate( {
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-2" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );



    $('input:radio[name=type]').click(function () {

        if ($('input:radio[name=type]:checked').val() == 'Person') {
            $('.box-person-fisica').fadeIn(700).show();
            $('.box-person-juridica').fadeIn(700).hide();
        }

        if ($('input:radio[name=type]:checked').val() == 'Company') {
            $('.box-person-juridica').fadeIn(700).show();
            $('.box-person-fisica').fadeIn(700).hide();
        }


    });


});



