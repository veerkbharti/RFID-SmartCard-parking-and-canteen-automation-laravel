@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Add-Slot" />
        <!-- /.content-header -->
        @if (session('slot-update-success'))
            <x-alert-message type="success" message="{{ session('slot-update-success') }}" />
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Slot details
                            </h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form action="{{ route('slot.update', ['id' => $slots[0]->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <label for="no_of_slots" class="col-sm-3 col-form-label">No of slots :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="no_of_slots" id="no_of_slots" class="form-control"
                                            value="{{ $slots[0]->no_of_slots }}">
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
