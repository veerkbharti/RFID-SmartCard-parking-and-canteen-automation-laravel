@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Posts" />
        <!-- /.content-header -->
        @if (session('food-delete-success'))
            <x-alert-message type="success" message="{{ session('food-delete-success') }}" />
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total foods</h3>
                                <div class="card-tools">
                                    <a type="button" class="btn btn-outline btn-outline-primary btn-sm"
                                        data-widget="collapse" data-toggle="tooltip" title="Add Event" href="./foods/add">
                                        <i class="fa fa-plus"></i> Add Food
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thumb</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($foods as $food)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td><img src="{{ asset('storage/thumbnails/' . $food->thumbnail) }}"
                                                        alt="{{ $food->name }}" class="img-rounded" style="width:60px;">
                                                </td>
                                                <td>{{ $food->name }}</td>
                                                <td>{{ $food->category }}</td>
                                                <td>{{ $food->description }}</td>
                                                <td>{{ $food->price }}</td>
                                                <td>
                                                    <nav class="nav  ">
                                                        <a class="nav-link text-primary"
                                                            href="{{ route('food.edit', ['id' => $food->id]) }}"><i
                                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                                        {{-- <a class="nav-link text-danger" href="#"><i
                                                                class="fa fa-trash delete-food"
                                                                data-foodid="{{ $food->food_id }}"></i></a> --}}
                                                        <a class="nav-link text-danger"
                                                            href="{{ route('food.delete', ['id' => $food->id]) }}"><i
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
