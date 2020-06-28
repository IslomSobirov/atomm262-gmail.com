@extends('layouts.navAndFooter')
@section('content')
    {{-- <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <h2>Add project</h2>
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <form action="/post" class="w-100" method="POST">
                @csrf
                  <input type="text" name="name" class="custom-input mt-4" required placeholder="Project title">
                  <p class="mt-4">About</p>
                  <textarea name="about" rows="4" class="custom-input" required placeholder="About project"></textarea>
                  <p class="mt-4">Details</p>
                  <textarea name="description" required rows="7" class="custom-input" placeholder="Project details"></textarea>

                  <input type="text" name="reference" class="custom-input mt-4" placeholder="Telegram username">
                  <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                  <input type="submit" class="custom-btn custom-btn-accent mt-2 ml-2 float-right" value="Save">
                <a href="{{ url()->previous()}}" class="custom-btn mt-2 float-right">Back</a>
              </form>
        </div>
    </div> --}}

      <div class="col-lg-8">
          <h6 class="title">Добавить проект</h6>
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form action="/post" method="POST" autocomplete="on">
            @csrf
              <input name="name" class="input-style" type="text" placeholder="Название проекта">

              <div id="editor">
                  <h3>Детали проекта</h3>
              </div>
              
              <textarea name="about" class="input-style" type="text" placeholder="Референсы"></textarea>
              <textarea name="description" required rows="7" class="input-style" placeholder="Project details"></textarea>
                <select name="skills[]" class="selectpicker select-input multiselect1" multiple data-live-search="true">
                  @foreach ($skills as $skill)
                    <option>{{ $skill->name }}</option>
                  @endforeach
                </select>
              <input name="reference" class="input-style" type="text" placeholder="Имя пользователя в Telegram">
              <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
              <div class="d-flex justify-content-end">
                  <button class="back-btn mr-3">Назад</button>
                  <button href="{{ url()->previous()}}" class="active-btn">Сохранить</button>
              </div>
          </form>
      </div>
  <script>
    initSample();
</script>
@endsection