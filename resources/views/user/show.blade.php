@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <form action="" class="search-field d-flex">
            <input type="text" placeholder="Search" class="search-field-input">
            <input type="submit" value="🔍" class="search-field-submit">
        </form>
  </div>
</div>
<div class="row mt-4">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="user-block">
            <div class="d-flex">
                <div class="user-image mr-4 ">
                    <img class="w-100" src="{{$user->avatar ? asset($user->avatar) : asset('ext/img/no-image.webp')}}" alt="">
                </div>

                <div class="user-info mt-4">
                    <h5 class="user-block-name">{{$user->name}}</h5>
                    <p class="user-block-stack">{{$user->role}}</p>
                </div>
            </div>
            <div class="publication-block-description mt-4">
                <span><b>About me</b></span>
                <p>{{$user->about}}</p>

                {{-- <span><b>About Stack</b></span>
                <p> Исчисление предикатов дискредитирует конфликт, ломая рамки привычных представлений. Вероятностная логика контролирует гений. Здравый смысл трансформирует закон исключённого третьего, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире. Мир философски контролирует онтологический гедонизм, не учитывая мнения авторитетов. Интересно отметить, что гений реально принимает во внимание типичный позитивизм, изменяя привычную реальность.</p> --}}

                {{-- <span class="w-100 float-left"><b>Protfolio</b></span>
                <a href="#" class="w-100 float-left mb-4">https://claire-murphy.co</a> --}}

                <span class="w-100 float-left"><b>Contacts</b></span>
                <a href="tel:+998 {{$user->contact}} ">+998 {{$user->contact}}</a>
            </div>
            <div class="publication-block-footer mt-4 w-100 d-flex justify-content-between">
                <!-- <a href="#" class="custom-btn">Send a message</a> -->
                <a href="{{url()->previous()}}" class="custom-btn">Back</a>
            </div>

        </div>
    </div>
</div>
@endsection
