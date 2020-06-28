@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
{{--    <div class="row">--}}
{{--        @include('layouts.search')--}}
{{--    </div>--}}
{{--    <div class="row mt-4">--}}
{{--        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
{{--            @foreach ($posts as $post)--}}
{{--                <a href="/post/{{$post->id}}" class="unstyled-link">--}}
{{--                    <div class="publication-block my-2">--}}
{{--                        <h5 class="publication-block-headline">{{$post->name}}</h5>--}}
{{--                        @if(isset($post->user->name))--}}
{{--                        <p class="publication-block-author">{{ $post->user->name }}</p>--}}
{{--                        @endif--}}
{{--                        <p>{{ Str::words($post->about, 10)}}</p>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="row mt-4">
    <div class="col-lg-8 order-lg-1 order-2">
        @include('layouts.search')

        <ul class="w-list">
            @foreach($posts as $post)
                <li class="w-list-item">
                    <a href="/post/{{$post->id}}">
                        <div class="user-info">
                            <h6>{{ $post->name }}</h6>
                            @if(isset($post->user->name))
                                <p class="publication-block-author">{{ $post->user->name }}</p>
                            @endif
                            <p>
                                {{ Str::words($post->about, 10)}}
                            </p>
                            <div class="tags">
                                @foreach ($post->skills as $skill)
                                    <button onclick="location.href='#'">{{ $skill->name }}</button>
                                @endforeach
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        {{-- {{ $posts->links() }} --}}
    </div>
    @include('layouts.messageToUser')
</div>
@endsection
