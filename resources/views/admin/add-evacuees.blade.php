@extends('layouts.main')
@section('content')
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 animated bounceInRight">
                            <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Add
                                Evacuees</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Evacuees</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Evacuees Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.AddEvacuess') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text"
                                                        class="form-control @error('Last_name') is-invalid @enderror"
                                                        name="Last_name" placeholder="Last Name">
                                                </div>
                                                @error('Last_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text"
                                                        class="form-control @error('First_name') is-invalid @enderror"
                                                        name="First_name" placeholder="First Name">
                                                </div>
                                                @error('First_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text"
                                                        class="form-control @error('Middle_name') is-invalid @enderror"
                                                        name="Middle_name" placeholder="Middle Name">
                                                </div>
                                                @error('Middle_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Contacts</label>
                                                    <input type="number"
                                                        class="form-control @error('contact') is-invalid @enderror"
                                                        name="contact" placeholder="ex. 09864723647">
                                                </div>
                                                @error('contact')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="number"
                                                        class="form-control @error('age') is-invalid @enderror"
                                                        name="age" placeholder="Age">
                                                </div>
                                                @error('age')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control @error('gender') is-invalid @enderror"
                                                        name="gender" id="gender">
                                                        <option selected>&larr;Select Gender &larr;</option>

                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                @error('gender')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label>Barangay</label>
                                                    <select class="form-control @error('brgy') is-invalid @enderror"
                                                        name="brgy">

                                                        <option selected>&larr;Select barangay &larr;</option>
                                                        @foreach ($brgy as $row)
                                                            <option value="{{ $row->barangay_name }}">
                                                                {{ $row->barangay_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                                @error('brgy')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address"></textarea>
                                                </div>
                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Head of Family</label>
                                                    <input type="text" name="head_fam"
                                                        class="form-control @error('head_fam') is-invalid @enderror"
                                                        placeholder="Head of Family">
                                                </div>
                                                @error('head_fam')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Evacuation Center</label>
                                                    <select class="form-control @error('evac_center') is-invalid @enderror"
                                                        name="evac_center">
                                                        <option selected>&larr;Select Evacuation Center &larr;</option>

                                                        @foreach ($evac_center as $rowcenter)
                                                            <option value="{{ $rowcenter->center_name }}">
                                                                {{ $rowcenter->center_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                                @error('evac_center')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label>Calamity</label>
                                                    <select class="form-control @error('calamity') is-invalid @enderror"
                                                        name="calamity">

                                                        <option selected>&larr;Select Calamity &larr;</option>
                                                        @foreach ($calamity as $rowcal)
                                                            <option value=" {{ $rowcal->calamity_name }}">
                                                                {{ $rowcal->calamity_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                @error('calamity')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <!-- Your Blade View (admin.manage-evacuees.blade.php) -->

    <!-- The rest of your view content -->
@endsection
