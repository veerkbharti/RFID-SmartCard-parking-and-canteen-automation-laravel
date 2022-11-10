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
                            <form action="{{ route('food.update', ['id' => $food->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label">Food name :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="name" required class="form-control" value="{{$food->name}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="category" class="col-sm-3 col-form-label">Category :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="category" id="category" required class="form-control" value="{{$food->category}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="price" class="col-sm-3 col-form-label">Price :</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="price" id="price" required class="form-control" value="{{$food->price}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="description" class="col-sm-3 col-form-label">Description :</label>
                                    <div class="col-sm-6">
                                        <textarea rows="2" name="description" id="description" required class="form-control">{{$food->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="thumbnail" class="col-sm-3 col-form-label">Thumbnail :</label>
                                    <div class="col-sm-6">
                                        <input type="file" accept="image/*" name="thumbnail" id="thumbnail"
                                            class="form-control" value="{{$food->thumbnail}}">
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
