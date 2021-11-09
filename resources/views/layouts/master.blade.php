<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="https://code.highcharts.com/highcharts.js"></script>

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <style>
        [x-cloak] {
            display: none;
        }

        @media print {

            header,
            footer,
            aside,
            form,
            .notprint {
                display: none;
            }

            #printElement {
                display: flex;
            }
        }

    </style>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    @livewireStyles
    @stack('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
        integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"
        integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ=="
        crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layouts.partials.footer')

    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('dist/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.session.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>

    {{-- <script src="{{asset('dist/js/jquery.min.js')}}"></script> --}}

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- InputMask -->
    <script src="{{ asset('dist/js/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('dist/js/bootstrap-switch.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
    {{-- Printjs --}}
    <script src="{{ asset('dist/js/print.js') }}"></script>
    <script src="{{ asset('dist/js/scirpt.js') }}"></script>
    @livewireScripts
    <script src="http://cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
    {{-- <script src="{{asset('ckeditor/app.js')}}"></script> --}}
    @stack('scripts')
    <script type="text/javascript">
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                timer: event.detail.timer,
                type: event.detail.type,
                icon: event.detail.icon,
                toast: event.detail.toast,
                position: event.detail.position,
            })
        });
        // $(function () {
        //   var selector = document.getElementById("selector");
        //   var im = new Inputmask("99-9999999");
        //   im.mask(selector);
        // });
        // var selectedValuesTest = ["WY", "AL", "NY"];
        // <select id="e1" style="width:400px" name="states[]">
        //               <option value="AL">Alabama</option>
        //               <option value="NY">New york</option>
        //               <option value="WY">Wyoming</option>
        //             </select>
        $(document).ready(function() {
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
            // $("#e1").select2({
            //   multiple: true,
            // });

            $('.js-single').select2();
            $('.select2').select2();
            // $('#e1').val(selectedValuesTest).trigger('change');
        });
    </script>
    <script>
        $(function() {
            var tbid;
            $('tr td .inventar').click(function() {
                var tbid = $(this).data('id');
                $('#inventar_id').val(tbid);
            });
            // $("#book_Submit").click(function(){

            // })

            $('#book_form').one('submit', function() {
                // $(this).find('input[type="submit"]').attr('disabled','disabled');
                $("#book_Submit").attr("disabled", true);
            });

        });
    </script>
</body>

</html>
