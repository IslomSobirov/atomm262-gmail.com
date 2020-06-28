@extends('layouts.navAndFooter')
@section('content')
{{-- <div class="row">
    @include('layouts.search')
</div> --}}
{{-- <div class="row mt-4">
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
</div> --}}
<div class="row mt-4">
    <div class="col-lg-8 order-lg-1 order-2">
        {{-- <form action="" class="search-form">
            <input type="text" placeholder="Поиск">
            <button class="search-btn"><img src="{{ asset('data/img/search.svg') }}" alt=""></button>
        </form> --}}

        <div class="freelancer">
            <div class="top d-flex justify-content-between">
                <div class="user-info d-flex">
                    <div>
                        <h6>{{$post->name}}</h6>
                        <p>{{$post->user->name}}</p>
                    </div>
                </div>
            </div>
            <div class="mid mt-3">
                <h6 class="mt-3">Детали проекта</h6>
                <p class="about-text">{{ $post->about }}</p>
                {{-- <h6 class="mt-3">Референсы</h6>
                <a href="#">https://claire-murphy.co</a> --}}
                <h6 class="mt-3">Навыки</h6>
                <div class="tags">
                    @foreach ($post->skills as $skill)
                        <button onclick="location.href='#'">{{ $skill->name }}</button>   
                    @endforeach
                </div>
                <h6 class="mt-3">Контакты: <a class="telegram-username" href=""><img src="data/img/telegram.svg" alt="">{{$post->contact}}</a></h6>
            </div>
            <div class="d-flex justify-content-between flex-column flex-sm-row">
                <button class="sent-message-btn" data-toggle="modal" data-target="#messageModal" type="button"><img src="{{ asset('data/img/mail.svg') }}" alt="mail"> Отправить сообщение</button>
                <a href="{{url()->previous()}}" class="back-btn">Назад</a>
            </div>
        </div>
    </div>
        @include('layouts.messageToUser')
</div>

    <!-- The Modal -->
    <div class="modal fade" id="messageModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('sendMessage') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Отправить сообщение</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <textarea name="text" required id="" cols="30" rows="10" class="input-style" placeholder="Напишите ваще сообщение сюда"></textarea>
                        <input type="hidden" name="user_id" value="{{$post->user->id}}">
                        <input type="hidden" name="from_user_id" value="{{ Auth()->user()->id }}">
                    </div>  

                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="active-btn" >Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection