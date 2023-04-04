@extends('adminlte::page')

@section('title', 'CicatricesDM')

@section('content_header')
<h1 id="titulo">Dashboard</h1>
@stop

@section('content')
<div id="contenido">

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $("#tipoObjetosIndex").on("click", function() {

        $("#contenido").empty();
        $.get('{{ route("indexTipoObjetos") }}', function(data) {
            $('#contenido').html(data);
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
                    }
                });
                break;
            case true:
                Swal.fire({
                    icon: 'success',
                    title: 'Guardado exitosamente',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
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
                    timer: 3000
                });
                break;
        }
    }
</script>
@stop