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
                            <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-user-lock"></span> Manage
                                Users</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
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

                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>

                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <p class="info"><b>{{ $user->name }}</b></p>

                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                @if ($user->status == 'active')
                                                    <span class="badge bg-success">{{ $user->status }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $user->status }}</span>
                                                @endif
                                            </td>

                                            <td class="text-right">
                                                <a class="btn btn-sm btn-success btn-edit" href="#"
                                                    data-id="{{ $user->id }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger btn-delete" href="#"
                                                    data-id="{{ $user->id }}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                    <h3>Are you sure want to delete this User?</h3>
                    <form id="delete-form">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <!-- Alternative method for specifying the HTTP method -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="id">
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- Start Edit Modal --}}
    <div id="editModal" class="modal animated rubberBand edit-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-edit" style="font-size: 50px;"></i>
                    <h3>Are you sure you want to edit this User</h3>
                    <div class="modal-body">

                        <form id="update-form">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <!-- Alternative method for specifying the HTTP method -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="hidden" id="id">
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="Full Name">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Account Category</label>
                                                    <select class="form-control" name="role" id="role">
                                                        <option selected="true" disabled="disabled">&larr; Select Role
                                                            &larr;</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option selected="true" disabled="disabled">&larr; Status
                                                            &larr;</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="email"
                                                        placeholder="Example@gmail.com" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="**********">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="#" class="btn btn-secondary">Cancels</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Edit Modal --}}
    <script>
        $(document).ready(function() {


            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var username = $(this).closest('tr').find('td:eq(1)').text().trim();
                var email = $(this).closest('tr').find('td:eq(2)').text().trim();
                var role = $(this).closest('tr').find('td:eq(3)').text().trim();
                var status = $(this).closest('tr').find('td:eq(4)').text().trim();

                $('#id').val(id);
                $('#name').val(username);
                $('#email').val(email);
                $('#role').val(role.toLowerCase());
                $('#status').val(status);
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
            var name = $('#name').val();
            var email = $('#email').val();
            var role = $('#role').val();
            var status = $('#status').val();
            var password = $('#password').val();



            $.ajax({
                type: 'PUT',
                url: '/admin/edit/user/' + id,
                data: {
                    name: name,
                    email: email,
                    role: role,
                    status: status,
                    password: password,


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
        $(document).ready(function() {


            $('.btn-delete').click(function() {
                var id = $(this).data('id');
                $('#id').val(id);
                $('#delete').show();
            });
            $('#delete .btn-secondary').click(function() {
                $('#delete').hide();
            });


        });
        $('#delete-form').submit(function(event) {
            event.preventDefault();
            var id = $('#id').val();

            $.ajax({
                type: 'DELETE',
                url: '/admin/delete/user/' + id,
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    $('#delete').hide();
                    alert(data.message);
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
