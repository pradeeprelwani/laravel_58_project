<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>

        <!-- Styles -->
        <link href="{{url('/css/app.css')}}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
    </head>
    <body>
        <div class="container">
    <div class="row">

       <div class="col-md-2">
                  
      
        <ul class="list-group">
            <li>
                <a href="{{ route('admin.employees.index') }}">
                    Employees
                </a>
            </li>
             <li>
                                    <a href="{{ url('/admin/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
        </ul>  </div>
         <div class="col-md-10">
                       @if(Session::has('success'))
<div class="alert alert-success">{{ session()->get('success') }}</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">{{ session()->get('error') }}</div>
@endif
        @yield('content')
         </div> </div> </div>
        <!-- Scripts -->
        <script src="{{url('/js/app.js')}}"></script>
      @yield('scripts')
    </body>
</html>
