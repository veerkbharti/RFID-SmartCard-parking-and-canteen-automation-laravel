@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Posts" />
        <!-- /.content-header -->
        @if (session('employee-delete-success'))
            <x-alert-message type="success" message="{{ session('employee-delete-success') }}" />
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total employees</h3>
                                <div class="card-tools" >
                                    <a type="button" class="btn btn-outline btn-outline-primary btn-sm"
                                        data-widget="collapse" data-toggle="tooltip" title="Add Event" href="./employees/add">
                                        <i class="fa fa-plus"></i> Add Employee
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>Company</th>
                                            <th>Job Title</th>
                                            <th>RFID</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->dob }}</td>
                                                <td>{{ $employee->company }}</td>
                                                <td>{{ $employee->job_title }}</td>
                                                <td>{{ $employee->rfid }}</td>
                                                {{-- <td>
                                                    <a href="{{route('')}}">
                                                        <label class='switch cat-status-btn mt-2'
                                                            data-status={{ $employee->employee_status }}
                                                            data-id={{ $employee->employee_id }}>
                                                            <input type='checkbox'
                                                                {{ $employee->employee_status == 1 ? 'checked' : '' }}><span
                                                                class='slider round'></span>
                                                        </label>
                                                    </a>
                                                </td> --}}
                                                <td>
                                                    <nav class="nav  ">
                                                        <a class="nav-link text-primary"
                                                            href="{{ route('employee.edit', ['id' => $employee->id]) }}"><i
                                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                                        {{-- <a class="nav-link text-danger" href="#"><i
                                                                class="fa fa-trash delete-employee"
                                                                data-employeeid="{{ $employee->employee_id }}"></i></a> --}}
                                                        <a class="nav-link text-danger"
                                                            href="{{ route('employee.delete', ['id' => $employee->id]) }}"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </nav>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
