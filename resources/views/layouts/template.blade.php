<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{ Storage::url('logo_unri.svg') }}">

    <!-- App css -->
    <link href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend/css/theme.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>




    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @yield('content')
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        {{ date('Y') }}
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="{{ url('backend/js/jquery.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('backend/js/metismenu.min.js') }}"></script>
    <script src="{{ url('backend/js/waves.js') }}"></script>
    <script src="{{ url('backend/js/simplebar.min.js') }}"></script>

    <script src="{{ url('backend/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('backend/js/theme.js') }}"></script>

    <script>
        $(function() {
            $("#dataTable").DataTable({
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>"
                    }
                },
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
            });

            $("#dataTable-histori").DataTable({
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>"
                    }
                },
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
            });
        })
    </script>

</body>

</html>