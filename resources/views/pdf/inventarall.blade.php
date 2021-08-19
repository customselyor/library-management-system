
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
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @hasSection('title')
    <title>@yield('title') - {{ config('app.name') }}</title>
  @else
    <title>{{ config('app.name') }}</title>
  @endif

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  
  <style>    
    
    [x-cloak] {
      display: none;
    }
    @media print {
      header, footer, aside, form, .notprint {
        display: none;
      }
     
      #printElement{
        display: flex;
      }
    }
  </style>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">  
</head>
<body class="hold-transition sidebar-mini"  >
    <div class="wrapper">
        <div class="container">
            <div class="row">
                @foreach ($items as $key=>$item)
                    @php
                        $key +=1;
                    @endphp
                    <div style="width: 20%">
                        <div class="d-flex align-items-center flex-column" style="height: 200px;">
                            <div ><img src="data:image/png;base64,{{$item->qr_img}}" alt="{{$item->invertar_number}}" style="width: 150px;height: 150px;"></div>
                            <div><center>{{$item->invertar_number}}</center></div>
                        </div>
                    </div>
                    @if ($key%35==0)
                        <div class="col-md-12">
                            <h1> &nbsp;</h1>
                        </div>
                        <div class="col-md-12">
                            <h1> &nbsp;</h1>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('dist/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>

{{-- <script src="{{asset('dist/js/jquery.min.js')}}"></script> --}}

<script src="{{asset('js/app.js')}}"></script>
 
<!-- InputMask -->
<script src="{{asset('dist/js/jquery.inputmask.bundle.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('dist/js/bootstrap-switch.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('dist/js/select2.full.min.js')}}"></script>

 <script>
    window.onload = function () {
        window.print();
        setTimeout(function(){window.close();}, 1);
    }
    // $(function(){

    //     var document_focus = false; // var we use to monitor document focused status.
    //     // Now our event handlers.
    //     $(document).ready(function() { win.window.print();document_focus = true; });
    //     setInterval(function() { if (document_focus === true) { win.window.close(); }  }, 300);
    // })   
 </script>

</body>
</html>

