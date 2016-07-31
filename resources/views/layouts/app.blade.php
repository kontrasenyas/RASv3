<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.theme.min.css">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
    <script src="/js/sweetalert.min.js"></script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Rent A Service
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @if (Auth::user() != '')
                        <li><a href="{{ url('/product') }}">My Post</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">                    
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{ url('/product/create')}}"><span class="glyphicon glyphicon-plus"></span> Post your Car</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;"">
                                <img src="/uploads/avatars/{{ Auth::user()->Photo }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/messages/')}}">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            @include('partials.search')
            @include('partials.messages')
        </div>
    </nav>
    <!-- Left bar -->
    <div class="col-md-2 col-md-offset-0">
        <div class="container">
            <div class="row">                
                <div class="panel panel-default col-md-2" style="padding-right: 0px; padding-left: 0px; !important">
                    <div class="panel-heading">
                        Browse by Car Type
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-md-12">                           
                            @foreach($CarType as $CarType_)
                                <a href="/search?term=&CarType={{$CarType_}}&Location=&Capacity=&Price=">{{$CarType_}}</a><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">@yield('panelHeading')</div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
                    
             <!--    </div>
            </div>
        </div>
    </div> -->
    
    


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function()
        {
             $( "#Location" ).autocomplete({
              source: "{{ url('search/autocomplete') }}",
              minLength: 3,
              select: function(event, ui) {
                $('#Location').val(ui.item.value);
              },
               open: function(){
                setTimeout(function () {
                        $('.ui-autocomplete').css('z-index', 99999999999999);
                    }, 0);
                }
            });
        });
    </script>
    <script>
        $(function() {
            if ({{ Request::old('autoOpenModal', 'false') }}) {
                $('#BookCar').modal('show');
            }
        });
    </script>
</body>
</html>