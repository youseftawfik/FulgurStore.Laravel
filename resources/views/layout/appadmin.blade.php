<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  
  <link rel="stylesheet" href="{{asset('back/css/themify-icons.css')}}"> 
  <link rel="stylesheet" href="{{asset('back/css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('back/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('back/css/style.css')}}">

</head>
<body>
    <div class="container-scroller">

        @include('partials.nav1')

        <div class="container-fluid page-body-wrapper">

        @include('partials.nav2')  
    
    @yield('content')

    <script src="{{asset('back/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('back/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('back/js/off-canvas.js')}}"></script>
    <script src="{{asset('back/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('back/js/template.js')}}"></script>
    <script src="{{asset('back/js/settings.js')}}"></script>
    <script src="{{asset('back/js/todolist.js')}}"></script>
    <script src="{{asset('back/js/dashboard.js')}}"></script> 
    <script src="{{asset('back/js/data-table.js')}}"></script>
    <script src="{{asset('back/js/chart.js')}}"></script>
    <script src="{{asset('back/js/bootbox.min.js')}}"></script>
    
    <script>
      $(document).on("click","#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Do you want to delete it ?", function(confirmed){
          if (confirmed) {
            window.location.href = link;
          };
        });
      });
    </script>
  </body>
  
</html>