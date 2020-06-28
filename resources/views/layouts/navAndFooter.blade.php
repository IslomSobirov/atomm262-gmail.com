{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--	<meta charset="utf-8">--}}
{{--	<title>Worklance | Freelance marketplace</title>--}}
{{--	<meta name="description" content="Freelance projects">--}}
{{--	<meta name="viewport" content="width=device-width">--}}
{{--	<link rel="icon" href="{{asset('ext2/images/favicon.png')}}">--}}
{{--	<meta property="og:image" content="{{asset('ext2/img/dest/preview.jpg')}}">--}}
{{--	<link rel="stylesheet" href="{{asset('ext2/css/app.min.css')}}">--}}

{{--</head>--}}

{{--<body>--}}

{{--	<!-- CUSTOM HTML -->--}}
{{--	<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--		<div class="container">--}}
{{--			<a class="navbar-brand" href="/home"><img src="{{asset('ext2/images/logo.svg')}}" alt=""></a>--}}
{{--			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--			<span class="navbar-toggler-icon"></span>--}}
{{--			</button>--}}

{{--			<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--			<ul class="navbar-nav mr-auto">--}}
{{--				<li class="nav-item">--}}
{{--				<a class="nav-link" href="/home">Publications <span class="sr-only">(current)</span></a>--}}
{{--				</li>--}}
{{--				<li class="nav-item">--}}
{{--				<a class="nav-link" href="/users">Freelancers</a>--}}
{{--				</li>--}}
{{--			</ul>--}}
{{--			<div class="d-flex ml-auto">--}}
{{--				<div class="user-info mr-2">--}}
{{--					<div class="dropdown">--}}
{{--						<a style="cursor:pointer;" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--							{{Auth::user()->name}}--}}
{{--						</a>--}}
{{--						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--						  <a class="dropdown-item" href="/dashboard">Settings</a>--}}

{{--						  <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        Logout--}}
{{--                          </a>--}}

{{--							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--								@csrf--}}
{{--							</form>--}}
{{--						</div>--}}
{{--					  </div>--}}
{{--						<p class="pr-3">{{Auth::user()->profileType}}</p>--}}
{{--				</div>--}}
{{--				<div class="user-image">--}}
{{--					<img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('ext2/images/user-avatar.jpg')}}" alt="" class="w-100">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	  </nav>--}}
{{--	<div class="container mt-4">--}}
{{--		@yield('content')--}}
{{--	</div>--}}

{{--	<script src="{{asset('ext2/js/app.min.js')}}"></script>--}}
{{--	<script>--}}
{{--		$(function(){--}}
{{--			$('a').each(function(){--}}
{{--				if ($(this).prop('href') == window.location.href) {--}}
{{--					$(this).addClass('active'); $(this).parents('li').addClass('active');--}}
{{--				}--}}
{{--			});--}}
{{--		});--}}
{{--	</script>--}}
{{--</body>--}}
{{--</html>--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worklance</title>
    <link rel="shortcut icon" href="{{ asset('data/img/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="data/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('data/css/style.css') }}">
    <meta property="og:image" content="{{asset('ext2/img/dest/preview.jpg')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{ asset('data/js/index.js') }}"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('data/img/WorklanceLogo.svg') }}" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <img src="{{ asset('data/img/menu.svg') }}" alt="">
    </button>


    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav w-100 align-items-lg-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Публикации</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}">Люди</a>
            </li>

            <li class="nav-item ml-lg-auto">
                <a class="nav-link" href="{{ route('post.create') }}">
                    <button class="add-project-btn">+ <span>Добавить проект</span></button>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="username">{{Auth::user()->name}}</span>
                            <p class="subdropdown">{{Auth::user()->profileType}}</p>
                        </div>
                        <div class="col-4 text-md-center">
                            <img class="nav-user-image" src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('ext2/images/user-avatar.jpg')}}" alt="User image">
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Мои проекты</a>
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Настройки</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        Выход
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="wrapper">
    <div class="container-fluid">
            @yield('content')
    </div>
</div>

<script>
    $(function(){
    	$('a').each(function(){
    		if ($(this).prop('href') == window.location.href) {
    			$(this).addClass('active'); $(this).parents('li').addClass('active');
    		}
    	});
    });
    	</script>
</body>
</html>
