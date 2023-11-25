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
                            <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-hotel"></span> Evacuation
                                Center</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Evacuation <Center></Center>
                                </li>
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
                        <form action="{{ route('admin.EvacuationCenter') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card-header">
                                            <span class="fa fa-hotel"> Evacuation Center Info</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Center Name</label>
                                                    <input type="text"
                                                        class="form-control @error('center_name') is-invalid @enderror"
                                                        name="center_name" placeholder="Center Name">
                                                </div>
                                            </div>
                                            @error('center_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" width="100"></textarea>
                                                </div>
                                            </div>
                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Info</label>
                                                    <input type="text" name="contact"
                                                        class="form-control @error('contact') is-invalid @enderror"
                                                        placeholder="ex. 09827373213">
                                                </div>
                                            </div>
                                            @error('contact')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary w-100">Save</button>

                                        </div>
                        </form>
                    </div>

                    <div class="col-md-9" style="border-left: 1px solid #ddd;">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Center Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evacinfo as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->center_name }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->contact }}</td>
                                        <td class="text-right">
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
    <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="../asset/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Evacuation Center?</h3>

                    <form id="delete-form" method="POST" action=" route('admin.delete', ['id' => $row->id]) }}">
                        <div class="form-group alert alert-danger" role="alert">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" class="form-control" id="delete-id" name="id">
                            <!-- Placeholders for displaying data -->
                            <div class="mb-3 alert alert-warning" id="delete-center-name"></div>
                            <div class="mb-3 alert alert-warning" id="delete-address"></div>
                            <div class="mb-3 alert alert-warning" id="delete-contact"></div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <a href="#" class="btn btn-secondary mr-2" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>

    {{-- edit-modal --}}
    <div id="editModal" class="modal animated rubberBand edit-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-edit" style="font-size: 50px;"></i>
                    <h3>Are you sure you want to edit this Evacuation Center?</h3>
                    <div class="modal-body">

                        <form id="update-form" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <!-- Alternative method for specifying the HTTP method -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <label>Center Name</label>
                                <input type="text" class="form-control" id="center_name" name="center_name">

                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" class="form-control" id="address" name="address">

                                <!-- Placeholder for Created at -->
                            </div>
                            <div class="mb-3">
                                <!-- Placeholder for Last update at -->
                                <label>Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact">

                            </div>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-success btn-update" id="submit-button">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // When the "Delete" button is clicked, open the modal and populate it
            $('.btn-delete').click(function() {
                var id = $(this).data('id');
                var centerName = $(this).closest('tr').find('td:eq(1)').text(); // Get the Calamity Name
                var address = $(this).closest('tr').find('td:eq(2)').text(); // Get Created at timestamp
                var contact = $(this).closest('tr').find('td:eq(3)')
                    .text(); // Get Last Updated at timestamp

                $('#delete-id').val(id);
                $('#delete-center-name').html('Calamity Name: ' + centerName);
                $('#delete-address').html('Address: ' + address);
                $('#delete-contact').html('Contact: ' + contact);

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
                url: '/admin/delete/center/' + id, // Replace with the actual URL for deleting data
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

        $(document).ready(function() {
            // When the "Edit" button is clicked, open the modal and populate the form
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var centerName = $(this).closest('tr').find('td:eq(1)').text(); // Get the Calamity Name
                var address = $(this).closest('tr').find('td:eq(2)').text(); // Get Created at timestamp
                var contact = $(this).closest('tr').find('td:eq(3)')
                    .text();

                $('#id').val(id);
                $('#center_name').val(centerName);
                $('#address').val(address);
                $('#contact').val(contact);


                $('#editModal').show();
            });

            // Close the modal when the "Close" button is clicked
            $('#editModal .btn-secondary').click(function() {
                $('#editModal').hide();
            });
        });

        $('#update-form').submit(function(event) {
            event.preventDefault();

            var id = $('#id').val();
            var centerName = $('#center_name').val();
            var address = $('#address').val();
            var contact = $('#contact').val();

            $.ajax({
                type: 'PUT',
                url: '/admin/edit/center/' + id,
                data: {
                    id: id,
                    center_name: centerName,
                    address: address,
                    contact: contact,
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
@endsection
