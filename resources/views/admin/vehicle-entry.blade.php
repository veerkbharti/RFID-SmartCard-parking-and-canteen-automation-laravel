<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PNGCity | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Summernote  -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Tagsinput style -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/tagsinput/tagsinput.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin_assets/dist/css/adminlte.min.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ url('admin_assets/dist/css/custom-styles.css') }}">
</head>

<body>
    @if (session('slot-update-success'))
        <x-alert-message type="success" message="{{ session('slot-update-success') }}" />
    @endif
    @if (session('slot-update-error'))
        <x-alert-message type="danger" message="{{ session('slot-update-error') }}" />
    @endif
    <div class="card w-50 m-auto mt-5 card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Slot details
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <form action="{{ route('slot.updateSlot', ['id' => $slot->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <p class="d-block">Available parking slots</p>
                        <h2>{{ $slot->no_of_slots }}</h2>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-8">
                        <input type="number" name="rfid" id="rfid" class="form-control"
                            placeholder="Scan RFID">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ url('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <!-- Summernote  -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <!-- DataTables  & Plugins -->
    <script src="{{ url('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Tags Input -->
    <script src="{{ url('admin_assets/plugins/tagsinput/tagsinput.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin_assets/dist/js/adminlte.js') }}"></script>
    <script src="{{ url('admin_assets/dist/js/scripts.js') }}"></script>

    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        //   $(function() {
        //       $('#post_content').summernote({
        //           height: 200,
        //       });
        //   })
    </script>
</body>

</html>
