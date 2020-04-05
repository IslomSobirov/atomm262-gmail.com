@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h2>Settings</h2>
            <form action="{{ route('personalInfo') }}" method="POST" enctype="multipart/form-data" class="w-100">
                @csrf
                
                <p>Personal Info</p>

                <input id="fileinput" name="avatar" type="file" style="display:none;"/>

                <button name="avatar" id="falseinput" type="button" class="custom-input">Choose avatar</button>
                <span id="selected_filename">No file selected</span>

                <input name="name" type="text" class="custom-input mt-4" value="{{Auth::user()->name}}" placeholder="Full Name">
                <select name="role" id="" class="custom-input mt-2">
                    @if(Auth::user()->role != null)
                        <option value="{{Auth::user()->role}}">{{Auth::user()->role}}</option>
                    @endif
                    <option value="Design">Design</option>
                    <option value="Front-end">Front-end</option>
                    <option value="Back-end">Back-end</option>
                </select>
                <input name="contact" type="tel" value="{{Auth::user()->contact}}" placeholder="Phone number" pattern="[0-9]{2}[0-9]{3}[0-9]{4}" class="custom-input mt-2">
                <small>Format: 998403546</small>
                <input type="submit" class="custom-btn mt-2 float-right" value="Save">
            </form>
            <form action="{{ route('changePassword') }}" method="POST" class="w-100">
                @csrf
                <p class="mt-5">Privacy</p>

                <input name="currentPassword" type="password" class="custom-input mt-2 @error('currentPassword') is-invalid @enderror" required autocomplete="new-password" placeholder="Current password">
                @error('currentPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input name="password" type="password" class="custom-input mt-2 @error('password') is-invalid @enderror" required placeholder="New password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input name="confirm" type="password" class="custom-input mt-2 @error('confirm') is-invalid @enderror" required placeholder="Confirm Password">
                @error('confirm')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="submit" class="custom-btn mt-2 float-right" value="Save">
            </form>


        </div>
        <div class="offset-1 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <h2>Extra Information</h2>
        <p>About</p>
        <form action="{{route('about')}}" method="POST">
            @csrf
            @method('PUT')
        <textarea name="about" rows="5" class="w-100 custom-input" placeholder="Type about yourself">{{Auth::user()->about}}</textarea>
            <input type="submit" class="custom-btn mt-2 float-right" value="Save">
        </form>
        <div class="publication-list mt-5">
            <a href="post/create" class="custom-btn custom-btn-accent">Add publication</a>
            @foreach ($userPosts as $post)
                <div class="publication-list-block mt-3">
                    <h5>{{$post->name}}</h5>
                    <a href="/post/{{$post->id}}/edit" class="btn-edit mr-2">Edit</a>
                    <a class="btn-delete" href="post/{{ $post->id }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('del{{$post->id}}').submit();">
                                        {{ __('Delete') }}
                          </a>
							<form id="del{{$post->id}}" action="post/{{ $post->id }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE') 
							</form>
                </div> 
            @endforeach
        </div>
        </div>
    </div>
@endsection