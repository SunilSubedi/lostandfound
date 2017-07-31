<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin_style.style.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style_sheet')


</head>
<body>
   <div class="container-fluid display-table">
        <div class="row display-table-row">
            @include('admin.admin_parts.navigation');
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                @include('admin.admin_parts.search');
                <div class="user-dashboard">
                  
                        @yield('content')
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    

</body>
  <script type="text/javascript" src=" {{ asset('js/app.js')}}"></script>
  @yield('script')
</html>