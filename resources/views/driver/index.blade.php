@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Driver</h3>
        </div>

        <div class="box-header"> 
            <a onclick="addForm()" class="btn btn-primary" >Tambah Driver</a>
        </div>


        <!-- /.box-header -->
        <div class="box-body">
            <table id="driver-table" class="table table-striped">
                <thead>
                <tr>
                    <th>NRP</th>
                    <th>NAMA DRIVER</th>
                    <th>TELEPON</th>
                    <th>FOTO</th>
                    <th>AKSI</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>

    {{--  FORM INPUT  --}}
    @include('driver.form')

@endsection

@section('bot')

    {{--  TABEL DATA  --}}
    <script src=" {{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>

    {{--  VALIDASI  --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    {{--<script>--}}
    {{--$(function () {--}}
    {{--$('#items-table').DataTable()--}}
    {{--$('#example2').DataTable({--}}
    {{--'paging'      : true,--}}
    {{--'lengthChange': false,--}}
    {{--'searching'   : false,--}}
    {{--'ordering'    : true,--}}
    {{--'info'        : true,--}}
    {{--'autoWidth'   : false--}}
    {{--})--}}
    {{--})--}}
    {{--</script>--}}

    {{--  //TAMPIL DATA  --}}
    <script type="text/javascript">
        var table = $('#driver-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.driver') }}",
            columns: [
                {data: 'nrp', name: 'nrp'},
                {data: 'nama_driver', name: 'nama_driver'},
                {data: 'no_hp', name: 'no_hp'},
                {data: 'show_photo', name: 'show_photo'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add DRIVER');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();

            $.ajax({
                url: "{{ url('driver') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Driver');

                    $('#id').val(data.id);
                    $('#nrp').val(data.nrp);
                    $('#nama_driver').val(data.nama_driver);
                    $('#no_hp').val(data.no_hp);
                    $('#foto').val(data.foto);

                },
                error : function() {
                    alert("Data Tidak Ditemukan");
                }
            });
        }

        function deleteData(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('DRIVER') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('driver') }}";
                    else url = "{{ url('driver') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",

                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });
    </script>

@endsection
