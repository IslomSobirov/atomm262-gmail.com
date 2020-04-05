@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <form action="/search" class="search-field d-flex" method="POST">
            @csrf
              <input name="search" type="text" placeholder="Search" class="search-field-input">
              <input type="submit" value="🔍" class="search-field-submit">
          </form>
    </div>
</div>
<div class="row mt-4">
  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
    @foreach ($users as $user)
        <a href="users/{{$user->id}}" class="unstyled-link">
            <div class="user-block my-2 d-flex">
                <div class="user-block-image mr-3">
                    <div class="user-image">
                        <img class="w-100" src=" {{asset($user->avatar)}}" alt="">
                    </div>
                </div>
                <div class="user-block-info">
                    <h5 class="user-block-name">{{$user->name}}</h5>
                    <p class="user-block-stack">{{$user->role ? $user->role : "Not entered yet"}}</p>
                    <p>{{$user->about ? $user->about : "Looking forwart to accomplish the tasks"}}</p>
                </div>
            </div>
        </a>
    @endforeach
  </div>
</div>
@endsection