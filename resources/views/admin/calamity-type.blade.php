@extends('layouts.main')
@section('content')
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-globe-asia"></span> Calamity
                                Type</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Calamity Type</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <!-- form start -->
                        @if (session()->has('alert-success'))
                            <div class="alert alert-success">
                                {{ session()->get('alert-success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.calamitytype') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card-header">
                                            <span class="fa fa-globe-asia"> Calamity Information</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Calamity Name</label>
                                                    <input type="text" name="calamity_name"
                                                        class="form-control @error('calamity_name') is-invalid @enderror"
                                                        placeholder="Calamity name">
                                                </div>
                                                @error('calamity_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary w-100">Save</button>

                                                </div>
                                            </div>
                                        </div>

                        </form>
                    </div>

                    <div class="col-md-9" style="border-left: 1px solid #ddd;">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Calamity Name</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calamity as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->calamity_name }}</td>

                                        <td>
                                            {{-- <a class="btn btn-sm btn-success btn-edit" href="#"
                                                data-id="{{ $row->id }}"><i class="fa fa-edit"></i> edit</a> --}}
                                            <a class="btn btn-sm btn-success btn-edit" href="#"
                                                data-id="{{ $row->id }}"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger btn-delete" href="#"
                                                data-id="{{ $row->id }}"><i class="fa fa-trash"></i> delete</a>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
        </div>

    </div>
    <!-- /.card-body -->
    </div>
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    {{-- delete modal --}}
    <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="text-center"><br>
                    <img src="../asset/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Calamity type?</h3>
                </div>
                <div class="modal-body text-center ">

                    <form id="delete-form" method="POST" action=" route('admin.delete', ['id' => $row->id]) }}">
                        <div class="form-group alert alert-danger" role="alert">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" class="form-control" id="delete-id" name="id">
                            <!-- Placeholders for displaying data -->
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <a href="#" class="btn btn-secondary mr-2" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- delete modal --}}

    {{-- edit-modal --}}
    <div id="editModal" class="modal animated rubberBand edit-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-edit" style="font-size: 50px;"></i>
                    <h3>Are you sure you want to edit this Calamity type?</h3>
                    <div class="modal-body">

                        <form id="update-form" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <!-- Alternative method for specifying the HTTP method -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="calamity-id" name="id">
                                <input type="text" class="form-control" id="calamity-type" name="calamity_name">

                            </div>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-success btn-update" id="submit-button">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- edit fetched data start --}}
    <script>
        $(document).ready(function() {
            // When the "Edit" button is clicked, open the modal and populate the form
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var calamityName = $(this).closest('tr').find('td:eq(1)').text(); // Get the Calamity Name


                $('#calamity-id').val(id);
                $('#calamity-type').val(calamityName);



                $('#editModal').show();
            });

            // Close the modal when the "Close" button is clicked
            $('#editModal .btn-secondary').click(function() {
                $('#editModal').hide();
            });
        });
        // Handle form submission
        $('#update-form').submit(function(event) {
            event.preventDefault();
            var id = $('#calamity-id').val();
            var calamityName = $('#calamity-type').val();

            $.ajax({
                type: 'PUT',
                url: '{{ route('admin.update', ['id' => ':id']) }}'.replace(':id', id),
                data: {
                    id: id,
                    calamity_name: calamityName,
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                },
                success: function(data) {
                    // Handle success, e.g., close the modal, show a success message, or update the table.
                    $('#editModal').hide();
                    alert(data.message);
                    location.reload(); // Refresh the page or update the table as needed.
                },
                error: function(data) {
                    // Handle errors, e.g., display an error message.
                    console.log(data);
                }
            });

        });
    </script>

    {{-- delete fetched data start --}}

    <script>
        $(document).ready(function() {
            // When the "Delete" button is clicked, open the modal and populate it
            $('.btn-delete').click(function() {
                var id = $(this).data('id');
                var calamityName = $(this).closest('tr').find('td:eq(1)').text(); // Get the Calamity Name


                $('#delete-id').val(id);
                $('#delete-calamity-type').html('Calamity Name: <br>' + calamityName);

                $('#delete').show();
            });

            // Close the modal when the "Close" button is clicked
            $('#delete .btn-secondary').click(function() {
                $('#delete').hide();
            });

        });

        $('#delete-form').submit(function(event) {
            event.preventDefault();
            var id = $('#delete-id').val();

            $.ajax({
                type: 'DELETE', // Use DELETE to match your route definition
                url: '/admin/delete/' + id, // Replace with the actual URL for deleting data
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    // Handle success, e.g., close the modal, show a success message, or update the table.
                    $('#delete').hide();
                    alert(data.message);
                    location.reload(); // Refresh the page or update the table as needed.
                },
                error: function(data) {
                    // Handle errors, e.g., display an error message.
                    console.log(data);
                }
            });
        });
    </script>
    {{-- delete form script end --}}
@endsection
