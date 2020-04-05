<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Worklance | Freelance marketplace</title>
	<meta name="description" content="Freelance projects">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="{{asset('ext2/images/favicon.png')}}">
	<meta property="og:image" content="{{asset('ext2/img/dest/preview.jpg')}}">
	<link rel="stylesheet" href="{{asset('ext2/css/app.min.css')}}">

</head>

<body>

	<!-- CUSTOM HTML -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="/home"><img src="{{asset('ext2/images/logo.svg')}}" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
		
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
				<a class="nav-link" href="/home">Publications <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="/users">Freelancers</a>
				</li>
			</ul>
			<div class="d-flex ml-auto">
				<div class="user-info mr-2">
					<div class="dropdown">
						<a style="cursor:pointer;" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{Auth::user()->name}}
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						  <a class="dropdown-item" href="/dashboard">Settings</a>

						  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                          </a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					  </div>
						<p class="pr-3">{{Auth::user()->profileType}}</p>
				</div>
				<div class="user-image">
					<img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('ext2/images/user-avatar.jpg')}}" alt="" class="w-100">
				</div>
			</div>
			</div>
		</div>
	  </nav>
	<div class="container mt-4">
		@yield('content')
	</div>
	
	<script src="{{asset('ext2/js/app.min.js')}}"></script>
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