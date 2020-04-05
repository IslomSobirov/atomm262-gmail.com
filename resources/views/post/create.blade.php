@extends('layouts.navAndFooter')
@section('content')
    <div class="row">
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
              <form action="/post/" class="w-100" method="POST">
                @csrf
                  <input type="text" name="name" class="custom-input mt-4" required placeholder="Project title">
                  <p class="mt-4">About</p>
                  <textarea name="about" rows="4" class="custom-input" required placeholder="About project"></textarea>
                  <p class="mt-4">Details</p>
                  <textarea name="description" required rows="7" class="custom-input" placeholder="Project details"></textarea>

                  <input type="text" name="reference" class="custom-input mt-4" placeholder="Link you want to leave">
                  <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                  <input type="submit" class="custom-btn custom-btn-accent mt-2 ml-2 float-right" value="Save">
                <a href="{{ url()->previous()}}" class="custom-btn mt-2 float-right">Back</a>
              </form>
        </div>
    </div>
@endsection