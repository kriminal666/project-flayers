<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Flyer</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="/css/libs.css">
    <link rel="stylesheet" href="/css/dropzone.css">
    <link rel="stylesheet" href="/blueimp/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="/blueimp/css/bootstrap-image-gallery.min.css">

</head>
<body>


    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ProjectFlyer</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if ($currentUser)
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle user-dropdown" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ $currentUser->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">

                                <li><a href="#">Your profile</a></li>
                                <li><a href="#">List users</a></li>
                                <li><a href="{{url('albums/create')}}">Action</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a target="_blank" href="https://es.gravatar.com">Create gravatar</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/libs.js"></script>

    @include('flash')
@yield('footer.scripts')



</body>
</html>

