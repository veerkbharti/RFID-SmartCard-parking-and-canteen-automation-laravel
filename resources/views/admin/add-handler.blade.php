@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Add-Handler" />
        <!-- /.content-header -->
        @if (session('handler-add-success'))
            <x-alert-message type="success" message="{{ session('handler-add-success') }}" />
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Handler details
                            </h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form action="./add" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="first_name">First Name</label>
                                        <input autocomplete="off" required type="text" placeholder="Enter handler first name" class="form-control" name="first_name"
                                            id="first_name">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="last_name">Last Name</label>
                                        <input autocomplete="off" required type="text" placeholder="Enter handler last name" class="form-control" name="last_name"
                                            id="last_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="email">Email</label>
                                        <input autocomplete="off" required type="email" placeholder="Enter handler email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="mobile">Phone</label>
                                        <input autocomplete="off" required type="text" placeholder="Enter handler phone" class="form-control" name="mobile" id="mobile">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="male" required>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="female" required>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="other"
                                                value="other" required>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <div class="row">
                                            <label for="dob" class="col-sm-3 col-form-label">DOB :</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="dob" id="dob" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="company">Company</label>
                                        <input autocomplete="off" required type="text" placeholder="Enter handler company" class="form-control" name="company" id="company">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="job_title">Job title</label>
                                        <input autocomplete="off" required type="text" placeholder="Enter handler job title" class="form-control" name="job_title" id="job_title">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="address">Address</label>
                                        <textarea autocomplete="off" required placeholder="Enter handler address" rows="1" class="form-control" name="address" id="address"></textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="city">City</label>
                                        <input autocomplete="off" required type="text" placeholder="Enter handler city" class="form-control" name="city" id="city">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="password">Password</label>
                                        <input autocomplete="off" required type="password" placeholder="Enter handler phone" class="form-control" name="password"
                                            id="password">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
