@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Posts" />
        <!-- /.content-header -->
        @if (session('handler-delete-success'))
            <x-alert-message type="success" message="{{ session('handler-delete-success') }}" />
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total handlers</h3>
                                <div class="card-tools" >
                                    <a type="button" class="btn btn-outline btn-outline-primary btn-sm"
                                        data-widget="collapse" data-toggle="tooltip" title="Add Event" href="./handlers/add">
                                        <i class="fa fa-plus"></i> Add Handler
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
                                        @foreach ($handlers as $handler)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $handler->first_name }} {{ $handler->last_name }}</td>
                                                <td>{{ $handler->email }}</td>
                                                <td>{{ $handler->dob }}</td>
                                                <td>{{ $handler->company }}</td>
                                                <td>{{ $handler->job_title }}</td>
                                                <td>{{ $handler->rfid }}</td>
                                                {{-- <td>
                                                    <a href="{{route('')}}">
                                                        <label class='switch cat-status-btn mt-2'
                                                            data-status={{ $handler->handler_status }}
                                                            data-id={{ $handler->handler_id }}>
                                                            <input type='checkbox'
                                                                {{ $handler->handler_status == 1 ? 'checked' : '' }}><span
                                                                class='slider round'></span>
                                                        </label>
                                                    </a>
                                                </td> --}}
                                                <td>
                                                    <nav class="nav  ">
                                                        <a class="nav-link text-primary"
                                                            href="{{ route('handler.edit', ['id' => $handler->id]) }}"><i
                                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                                        {{-- <a class="nav-link text-danger" href="#"><i
                                                                class="fa fa-trash delete-handler"
                                                                data-handlerid="{{ $handler->handler_id }}"></i></a> --}}
                                                        <a class="nav-link text-danger"
                                                            href="{{ route('handler.delete', ['id' => $handler->id]) }}"><i
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
