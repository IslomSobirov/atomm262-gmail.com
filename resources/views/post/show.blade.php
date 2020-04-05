@extends('layouts.navAndFooter')
@section('content')
<div class="row">
    @include('layouts.search')
</div>
<div class="row mt-4">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="publication-block">
            <h5 class="publication-block-headline">{{$post->name}}</h5>
            <p class="publication-block-author">{{$post->user->name}}</p>
            <div class="publication-block-description">
                <span><b>About project</b></span>
                <p>{{$post->about}}</p>

                <span><b>Specifications</b></span>
                <p>{{$post->description}}</p>

                @if(!empty($post->reference))
                    <span class="w-100 float-left"><b>References</b></span>
                    <a href="https://t.me/{{str_replace('@', '', $post->reference)}}" target="_blank" class="w-100 float-left mb-4">Telegram {{$post->reference}}</a>
                @endif
                @if($post->contact != null)
                    <span class="w-100 float-left"><b>Contacts</b></span>
                    <a href="#">{{$post->contact}}</a>
                @endif

            </div>
            <div class="publication-block-footer mt-4 w-100 d-flex justify-content-between">
                <a href="https://t.me/{{str_replace('@', '', $post->reference)}}" target="_blank" class="custom-btn">Send a message</a>
                <a href="{{url()->previous()}}" class="custom-btn">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection