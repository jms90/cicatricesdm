@extends('adminlte::page')

@section('title', 'CicatricesDM')

@section('content_header')
    <h1 id="titulo">Dashboard</h1>
@stop

@section('content')
    <style>
        .custom-swal-title {
            color: white;
        }

        .custom-swal-text {
            color: white;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px !important;
        }
    </style>
    <div id="contenido">

    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="{{asset('css/main.css')}}"> --}}
@stop

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#petrechosIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexPetrechos') }}', function(data) {
            $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#diosesIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexDioses') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#propiedadesDeObjetosIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexPropiedadesDeObjetos') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#lugaresCuerpoIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexLugaresCuerpo') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#tipoObjetosIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexTipoObjetos') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#EscuelasMagiaIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexEscuelasMagia') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#magiasIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexMagia') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#armasIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexArma') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#armadurasIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexArmaduras') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#bendicionesIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexBendicion') }}', function(data) {
                $('#contenido').html(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 403) {
                    cargaSwal(false,"No tiene permisos para realizar esta acción.")
                } else {
                    cargaSwal(false,"Error al realizar la petición.");
                }
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        setInterval(() => {
            $.get('/session', function (data) {
                if (data.authenticated) {
                    // El usuario sigue autenticado, no se hace nada.
                } else {
                    // El usuario no está autenticado, se redirige a la página de inicio de sesión.
                    window.location.replace('/login');
                }
            });
        }, 5000);


        function cargaSwal(tipo, texto = "") {

            switch (tipo) {
                case "load":
                    Swal.fire({
                        icon: 'info',
                        title: texto,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        },
                        customClass: {
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
                        }
                    });
                    break;
                case true:
                    Swal.fire({
                        icon: 'success',
                        title: texto,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        background: 'green',
                        customClass: {
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
                        }
                    });
                    break;
                case false:
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error',
                        text: texto,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        background: 'red',
                        customClass: {
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
                        }
                    });
                    break;
            }
        }
    </script>
@stop
