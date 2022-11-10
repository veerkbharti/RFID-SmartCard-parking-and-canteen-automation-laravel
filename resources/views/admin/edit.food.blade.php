@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Add-Food" />
        <!-- /.content-header -->
        @if (session('food-update-success'))
            <x-alert-message type="success" message="{{ session('food-update-success') }}" />
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Food details
                            </h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form action="{{ route('food.update', ['id' => $food->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="first_name">First Name</label>
                                        <input autocomplete="off" type="text" placeholder="Enter food first name"
                                            class="form-control" name="first_name" id="first_name"
                                            value="{{ $food->first_name }}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="last_name">Last Name</label>
                                        <input autocomplete="off" type="text" placeholder="Enter food last name"
                                            class="form-control" name="last_name" id="last_name"
                                            value="{{ $food->last_name }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="email">Email</label>
                                        <input autocomplete="off" type="email" placeholder="Enter food email"
                                            class="form-control" name="email" id="email"
                                            value="{{ $food->email }}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="mobile">Phone</label>
                                        <input autocomplete="off" type="text" placeholder="Enter food phone"
                                            class="form-control" name="mobile" id="mobile"
                                            value="{{ $food->mobile }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="male" required {{ $food->gender == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="female" required {{ $food->gender == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="other"
                                                value="other" required {{ $food->gender == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <div class="row">
                                            <label for="dob" class="col-sm-3 col-form-label">DOB :</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="dob" id="dob" class="form-control"
                                                    value="{{ $food->dob }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="company">Company</label>
                                        <input autocomplete="off" type="text" placeholder="Enter food company"
                                            class="form-control" name="company" id="company"
                                            value="{{ $food->company }}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="job_title">Job title</label>
                                        <input autocomplete="off" type="text" placeholder="Enter food job title"
                                            class="form-control" name="job_title" id="job_title"
                                            value="{{ $food->job_title }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="address">Address</label>
                                        <textarea autocomplete="off" placeholder="Enter food address" rows="1" class="form-control"
                                            name="address" id="address">{{ $food->address }}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="city">City</label>
                                        <input autocomplete="off" type="text" placeholder="Enter food city"
                                            class="form-control" name="city" id="city"
                                            value="{{ $food->city }}">
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
