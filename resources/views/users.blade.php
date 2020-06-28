@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
{{--<div class="row">--}}
{{--    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
{{--          <form action="/search" class="search-field d-flex" method="POST">--}}
{{--            @csrf--}}
{{--              <input name="search" type="text" placeholder="Search" class="search-field-input">--}}
{{--              <input type="submit" value="🔍" class="search-field-submit">--}}
{{--          </form>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="row mt-4">--}}
{{--  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
{{--    @foreach ($users as $user)--}}
{{--        <a href="users/{{$user->id}}" class="unstyled-link">--}}
{{--            <div class="user-block my-2 d-flex">--}}
{{--                <div class="user-block-image mr-3">--}}
{{--                    <div class="user-image">--}}
{{--                        <img class="w-100" src=" {{$user->avatar ? asset($user->avatar) : asset('ext/img/no-image.webp')}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="user-block-info">--}}
{{--                    <h5 class="user-block-name">{{$user->name}}</h5>--}}
{{--                    <p class="user-block-stack">{{$user->role ? $user->role : "Not entered yet"}}</p>--}}
{{--                    <p>{{$user->about ? $user->about : "Looking forward to accomplish the tasks"}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    @endforeach--}}
{{--  </div>--}}
{{--{{ $users->links() }}--}}
{{--</div>--}}
<div class="row mt-4">
    <div class="col-lg-8 order-lg-1 order-2">
        <form action="/search" method="POST" class="search-form">
            @csrf
            <input name="search" type="text" placeholder="Поиск">
            <button class="search-btn"><img src="{{ asset('data/img/search.svg') }}" alt="search image"></button>
        </form>
        <ul class="w-list">
            @foreach($users as $user)
                <li class="w-list-item">
                    <a href="{{ route('user', ['id' => $user->id]) }}">
                        <div class="d-flex">
                            <div class="mr-3">
                                <img src="{{$user->avatar ? asset($user->avatar) : asset('data/img/Ellipse.png')}}" alt="user image">
                            </div>
                            <div class="user-info">
                                <h6>{{ $user->name }}</h6>
                                <p>{{$user->role ? $user->role : "Not entered yet"}}</p>
                                <p>
                                    {{ $user->about ? $user->about : "Looking forward to accomplish the tasks" }}
                                </p>
                                <div class="tags">
                                    @foreach ($user->skills as $skill)
                                        <button onclick="location.href='#'">{{ $skill->name }}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        {{ $users->links() }}
    </div>
    @include('layouts.messageToUser')
</div>
@endsection
