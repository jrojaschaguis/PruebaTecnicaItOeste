<div class="container-fluid mb-5">
    
    {{-- Success is as dangerous as failure. --}}
    
    @if($action == "Table")
        @include('livewire.system-sige.paises.table')
    @endif

    @if($action == "Create")
        @include('livewire.system-sige.paises.create')
    @endif

    @if($action == "Show")
        @include('livewire.system-sige.paises.read')
    @endif

    @if($action == "Edit")
        @include('livewire.system-sige.paises.edit')
    @endif
    
</div>

<!-- scripts -->
@push('scriptsDestroyAll_Ordenar_Mostrar')
    <script>
    $(document).on('click', '#checkall', function() {
    //$('#checkall').on('click', function(e) {
        if($(this).prop("checked")) {
            $("input[type='checkbox']").prop("checked", true);
        } else {
            $("input[type='checkbox']").prop("checked", false);
        }
    });
    $(document).on('click', '.check_all', function(e) {
        e.preventDefault();
        deleteData = [];
        $('.table').find('input:checkbox[class="sub_check"]:checked').each(function() {
            deleteData.push(parseInt($(this).attr('data-id')));
        });
        if(deleteData.length <= 0) {
            swal("No hay ningun registro seleccionado!...", {
                icon: "warning",
                //buttons: true,
            });
            return;
        }
        //console.log($(this).attr('href'));
        $.ajax({
            url: $(this).attr('href'),
            type: 'DELETE',
            data: {
                ids: deleteData
            },
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                swal("Registros eliminados con éxito!...", {
                    icon: "success",
                    buttons: false,
                });
            },
            complete: function(data){
                $('#btnLimpiar').trigger('click');
                $("input[type='checkbox']").prop("checked", false);
            },
            error : function (xhr, textSatus, error){
                ///console.log('FAIL :: ', jqXRH.responseJSON);
            }
        });
        /*.done(function(data) {
            //console.log('DATA :: ', data);
            //$.getPaginateData(1);
            //swal('Eliminados con éxito!!!.');
            //$('#btnLimpiar').trigger('click');
            //$("tbody").empty();
            //$("tbody").html(data);
            //$("tbody").append(data);
            $("input[type='checkbox']").prop("checked", false);
        })
        .fail((jqXHR, options, error) => {
            //console.log('FAIL :: ', jqXRH.responseJSON);
        })*/
    });

    $(function() {

        var filtercodpai = $('#filtercodpai').val();
        var filterpais = $('#filterpais').val();
        var filtersigla = $('#filtersigla').val();
        if (filtercodpai !== '' || filterpais !== '' || filtersigla !== '') {
            $('#btnFiltrar').trigger('click');
            $('#btnFiltrar').addClass('active');
        }
        
    });

    Livewire.on('alert', function(title, message){
        swal({
            title: title, // "Good job!"
            text: message,
            icon: "success",
        });
    });

    Livewire.on('destroy_pais', id => {
        swal({
            title: "¿Estas seguro que quieres eliminar esté registro?",
            text: "¡Una vez eliminado, podrás recuperarlo de la papelera!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                Livewire.emitTo('system-sige.paises.index', 'destroy', id);
            } else {
                //swal("Your imaginary file is safe!");
                return;
            }
        });
    });

    </script>
@endpush
