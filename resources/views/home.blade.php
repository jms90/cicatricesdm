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
    </style>
    <div id="contenido">

    </div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->

@stop

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#propiedadesDeObjetos").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexPropiedadesDeObjetos') }}', function(data) {
                $('#contenido').html(data);
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

        $("#tipoObjetosIndex").on("click", function() {
            $("#contenido").empty();
            $.get('{{ route('indexTipoObjetos') }}', function(data) {
                $('#contenido').html(data);
            });
            $('li.nav-item a.nav-link').removeClass('active');
            $(this).find('a.nav-link').addClass('active');
        });

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
