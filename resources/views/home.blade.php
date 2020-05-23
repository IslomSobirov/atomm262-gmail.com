@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
    <div class="row">
        @include('layouts.search')
    </div>
    <div class="row mt-4">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
            @foreach ($posts as $post)
                <a href="/post/{{$post->id}}" class="unstyled-link">
                    <div class="publication-block my-2">
                        <h5 class="publication-block-headline">{{$post->name}}</h5>
                        @if(isset($post->user->name))
                        <p class="publication-block-author">{{ $post->user->name }}</p>
                        @endif
                        <p>{{ Str::words($post->about, 10)}}</p>
                    </div>
                </a>   
            @endforeach
        </div>
    </div>
@endsection
