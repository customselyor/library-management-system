
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
  <script src="https://code.highcharts.com/highcharts.js"></script>

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
  @livewireStyles
  @stack('styles')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous"></script>

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
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>

{{-- <script src="{{asset('dist/js/jquery.min.js')}}"></script> --}}

<script src="{{asset('js/app.js')}}"></script>
 
<!-- InputMask -->
<script src="{{asset('dist/js/jquery.inputmask.bundle.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('dist/js/bootstrap-switch.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('dist/js/select2.full.min.js')}}"></script>
{{-- Printjs --}}
<script src="{{asset('dist/js/print.js')}}"></script>
<script src="{{asset('dist/js/scirpt.js')}}"></script>

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
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
      $("input[data-bootstrap-switch]").each(function(){
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
  $(document).ready(function() {
  $('#micro_category_id').on('change', function() {
    var micro_categoryID = $(this).val();
    console.log(micro_categoryID);
    
    if(micro_categoryID) {
        $.ajax({
            url: '/findSubCategoryId/'+micro_categoryID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                // console.log(data);
              if(data){
                $('#micro_sub_category_id').empty();
                $('#micro_sub_category_id').focus;
                $('#micro_sub_category_id').append('<option value="">-- Select --</option>'); 
                $.each(data, function(key, value){
                  $('select[name="micro_sub_category_id"]').append('<option value="'+ value.id +'">' + value.title+ '</option>');
              });
            }else{
              $('#micro_sub_category_id').empty();
            }
          }
        });
    }else{
      $('#micro_sub_category_id').empty();
    }
  });

  $('#micro_sub_category_id').on('change', function() {
    var micro_sub_categoryId = $(this).val();
    console.log(micro_categoryID);
    
    if(micro_sub_categoryId) {
        $.ajax({
            url: '/findChildSubCategoryId/'+micro_sub_categoryId,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                // console.log(data);
              if(data){
                $('#micro_child_sub_category_id').empty();
                $('#micro_child_sub_category_id').focus;
                $('#micro_child_sub_category_id').append('<option value="">-- Select --</option>'); 
                $.each(data, function(key, value){
                  $('select[name="micro_child_sub_category_id"]').append('<option value="'+ value.id +'">' + value.title+ '</option>');
              });
            }else{
              $('#micro_child_sub_category_id').empty();
            }
          }
        });
    }else{
      $('#micro_child_sub_category_id').empty();
    }
  });

  var micro_categoryID = $('#micro_category_id').val();
    console.log(micro_categoryID);
    if(micro_categoryID) {
        $.ajax({
            url: '/findSubCategoryId/'+micro_categoryID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                // console.log(data);
              if(data){
                $('#micro_sub_category_id').empty();
                $('#micro_sub_category_id').focus;
                $('#micro_sub_category_id').append('<option value="">-- Select --</option>'); 
                $.each(data, function(key, value){
                  $('select[name="micro_sub_category_id"]').append('<option value="'+ value.id +'">' + value.title+ '</option>');
              });
            }else{
              $('#micro_sub_category_id').empty();
            }
          }
        });
    }else{
      $('#micro_sub_category_id').empty();
    }
});
</script>
{{-- @foreach (App\Models\LanguageSetting::active()->get() as $item)
    {{$item->code}}
@endforeach --}}
<script type="text/javascript">
{{--var mathElements = [--}}
        {{--'math',--}}
        {{--'maction',--}}
        {{--'maligngroup',--}}
        {{--'malignmark',--}}
        {{--'menclose',--}}
        {{--'merror',--}}
        {{--'mfenced',--}}
        {{--'mfrac',--}}
        {{--'mglyph',--}}
        {{--'mi',--}}
        {{--'mlabeledtr',--}}
        {{--'mlongdiv',--}}
        {{--'mmultiscripts',--}}
        {{--'mn',--}}
        {{--'mo',--}}
        {{--'mover',--}}
        {{--'mpadded',--}}
        {{--'mphantom',--}}
        {{--'mroot',--}}
        {{--'mrow',--}}
        {{--'ms',--}}
        {{--'mscarries',--}}
        {{--'mscarry',--}}
        {{--'msgroup',--}}
        {{--'msline',--}}
        {{--'mspace',--}}
        {{--'msqrt',--}}
        {{--'msrow',--}}
        {{--'mstack',--}}
        {{--'mstyle',--}}
        {{--'msub',--}}
        {{--'msup',--}}
        {{--'msubsup',--}}
        {{--'mtable',--}}
        {{--'mtd',--}}
        {{--'mtext',--}}
        {{--'mtr',--}}
        {{--'munder',--}}
        {{--'munderover',--}}
        {{--'semantics',--}}
        {{--'annotation',--}}
        {{--'annotation-xml'--}}
      {{--];--}}
  {{--window.onload = function() {--}}
    {{----}}
    {{--CKEDITOR.replace('body_uz', {--}}
      {{--contentsCss: ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'],--}}
      {{--filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',--}}
      {{--filebrowserUploadMethod: 'form',--}}
      {{--customConfig: '/ckeditor/config.js', --}}
    {{--});--}}
    {{--CKEDITOR.replace('body_ru', {--}}
      {{--contentsCss: ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'],--}}
      {{--filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',--}}
      {{--filebrowserUploadMethod: 'form',--}}
      {{--customConfig: '/ckeditor/config.js', --}}
    {{--});--}}
    {{--CKEDITOR.replace('body_en', {--}}
      {{--contentsCss: ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'],--}}
      {{--filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',--}}
      {{--filebrowserUploadMethod: 'form',--}}
      {{--customConfig: '/ckeditor/config.js', --}}
    {{--});--}}
     {{----}}
	{{--};--}}

</script>
<script>

    $(function () {
        var tbid;
        $('tr td .inventar').click(function() {
            var tbid = $(this).data('id');
            $('#inventar_id').val(tbid);
        });


    });
</script>
</body>
</html>
