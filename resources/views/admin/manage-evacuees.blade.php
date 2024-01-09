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
                            <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Manage
                                Evacuees</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Evacuees</li>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Evacuees info</th>
                                        <th>Barangay</th>
                                        <th>Address</th>
                                        <th>Head of Family</th>
                                        <th>Evacuation Center</th>
                                        <th>Calamity</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evac_info as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>
                                                <p class="info" id="name-info">
                                                    Name:
                                                    <b>{{ $row->Last_name . ' ' . $row->First_name . ' ' . $row->Middle_name }}</b>
                                                </p>
                                                <p class="info" id="age-date"><small>Age:
                                                        <b>{{ $row->age }}</b></small></p>
                                                <p class="info" id="gender-data"><small>Gender:
                                                        <b>{{ $row->gender }}</b></small></p>
                                                <p class="info" id="contact-data"><small>Contact:
                                                        <b>{{ $row->contact }}</b></small></p>
                                            </td>
                                            <td id="barangay">{{ $row->brgy }}</td>
                                            <td id="address2"><b>{{ $row->address }}</b></td>
                                            <td id="head">{{ $row->head_fam }}</td>
                                            <td id="center">{{ $row->evac_center }}</td>
                                            <td id="center">{{ $row->calamity }}</td>

                                            <td class="text-right">
                                                <a class="btn btn-sm btn-success btn-edit" href="#"
                                                    data-id="{{ $row->id }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger btn-delete" href="#"
                                                    data-id="{{ $row->id }}"><i class="fa fa-trash"></i></a>
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
                    <h3>Are you sure want to delete this Evacuee?</h3>
                    <form action="" id="delete-form-evacuee">
                        <input type="hidden" name="_method" value="PUT">
                        <!-- Alternative method for specifying the HTTP method -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="id">

                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger btn-update" id="submit-button">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit-modal --}}
    <div id="editModal" class="modal animated rubberBand edit-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-edit" style="font-size: 50px;"></i>
                    <h3>Are you sure you want to edit this Calamity type?</h3>
                    <div class="modal-body text-center" style="max-height: calc(100vh - 200px); overflow-y: auto;">

                        <form id="update-form">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" name="_method" value="PUT">
                                                <!-- Alternative method for specifying the HTTP method -->
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" class="form-control" name="Last_name"
                                                        placeholder="Last Name" id="last-name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="First_name"
                                                        placeholder="First Name" id="first-name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" class="form-control" name="Middle_name"
                                                        placeholder="Middle Name" id="middle-name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Contacts</label>
                                                    <input type="number" class="form-control" name="contact"
                                                        placeholder="ex. 09864723647" id="contact">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="number" class="form-control" name="age"
                                                        placeholder="Age" id="age">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option selected>&larr; Gender &larr;</option>

                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label>Barangay</label>
                                                    <select class="form-control" name="brgy" id="brgy">

                                                        <option selected>&larr;Select barangay &larr;</option>
                                                        @foreach ($brgy as $row)
                                                            <option value="{{ $row->barangay_name }}">
                                                                {{ $row->barangay_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" id="address" name="address"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Head of Family</label>
                                                    <input type="text" name="head_fam" class="form-control"
                                                        placeholder="Head of Family" id="head-fam">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Evacuation Center</label>
                                                    <select class="form-control" id="evac-center" name="evac_center">
                                                        <option selected>&larr;Select Evacuation Center &larr;</option>

                                                        @foreach ($evac_center as $rowcenter)
                                                            <option value="{{ $rowcenter->center_name }}">
                                                                {{ $rowcenter->center_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label>Calamity</label>
                                                    <select class="form-control" name="calamity-type" id="calamity-type">
                                                        <option selected>&larr; Select Calamity &larr;</option>
                                                        @foreach ($calamity as $rowcal)
                                                            <option value="{{ $rowcal->calamity_name }}">
                                                                {{ $rowcal->calamity_name }}</option>
                                                        @endforeach
                                                        <!-- Other options -->
                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-success btn-update"
                                    id="submit-button">Edit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- edit fetched data start --}}


    <script>
        $(document).ready(function() {


            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var nameParts = $(this).closest('tr').find('td:eq(1)').find('b').text().split(' ');
                var lastName = nameParts[0] || ""; // Index 0 for Last Name
                var firstName = nameParts[1] || ""; // Index 1 for First Name
                var middleName = "";
                var nameTokens = $(this).closest('tr').find('td:eq(1)').find('b').text().split(' ');
                for (var i = 2; i < nameTokens.length; i++) {
                    if (/^[a-zA-Z]+.*\d/.test(nameTokens[i])) {
                        var match = nameTokens[i].match(/([a-zA-Z]+)([0-9]+)/);
                        middleName = match ? match[1] : "";
                        break;
                    }
                }

                var age = $(this).closest('tr').find('td:eq(1) small:contains("Age")').find('b').text()
                    .trim();
                var gender = $(this).closest('tr').find('td:eq(1) small:contains("Gender")').find('b')
                    .text().trim();
                var contact = $(this).closest('tr').find('td:eq(1) small:contains("Contact")').find('b')
                    .text().trim();

                var brgy = $(this).closest('tr').find('td:eq(2)').text();
                var address = $(this).closest('tr').find('td:eq(3)').text();
                var headFam = $(this).closest('tr').find('td:eq(4)').text();
                var center = $(this).closest('tr').find('td:eq(5)').text();
                var calamity = $(this).closest('tr').find('td:eq(6)').text().trim();



                $('#id').val(id);
                $('#last-name').val(lastName);
                $('#first-name').val(firstName);
                $('#middle-name').val(middleName);
                $('#contact').val(contact);
                $('#age').val(age);
                $('#gender').val(gender);
                $('#brgy').val(brgy);
                $('#address').val(address);
                $('#head-fam').val(headFam);
                $('#evac-center').val(center);
                $('#calamity-type').val(calamity.trim());

                console.log("Calamity:", calamity);


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
            var lastName = $('#last-name').val();
            var firstName = $('#first-name').val();
            var middleName = $('#middle-name').val();
            var contact = $('#contact').val();
            var age = $('#age').val(); // Corrected this line
            var gender = $('#gender').val();
            var brgy = $('#brgy').val();
            var address = $('#address').val();
            var headFam = $('#head-fam').val();
            var center = $('#evac-center').val();
            var calamity = $('#calamity-type').val();

            $.ajax({
                type: 'PUT',
                url: '/admin/edit/evacuee/' + id,
                data: {
                    Last_name: lastName,
                    First_name: firstName,
                    Middle_name: middleName,
                    contact: contact,
                    age: age,
                    gender: gender,
                    brgy: brgy,
                    address: address,
                    head_fam: headFam,
                    evac_center: center,
                    calamity: calamity,
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
            // Close the modal when the "Close" button is clicked
            $('#delete .btn-secondary').click(function() {
                $('#delete').hide();
            });


        });
        $('#delete-form-evacuee').submit(function(event) {
            event.preventDefault();
            var id = $('#id').val();

            $.ajax({
                type: 'DELETE', // Use DELETE to match your route definition
                url: '/admin/delete/evacuee/' + id, // Replace with the actual URL for deleting data
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
@endsection
