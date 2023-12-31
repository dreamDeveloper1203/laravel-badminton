@extends('layouts.auth')

@section('content')
    <form class="custom-validation" action="{{route('register.user')}}" id="custom-form" method="post">
        @csrf
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <input type="text" class="form-control app-input" name="name" placeholder="{{__('messages.userID')}}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-1"></div>
            <div class="col-10">
                <input type="text" class="form-control app-input" name="email" placeholder="{{__('auth.email')}}" required data-parsley-type="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-1"></div>
            <div class="col-10">
                <input type="password" minlength="5" maxlength="50" id="pass2" class="form-control app-input" name="password" placeholder="{{__('auth.password')}}" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-1"></div>
            <div class="col-10">
                <input type="password" minlength="5" maxlength="50" class="form-control app-input" data-parsley-equalto="#pass2" placeholder="{{__('auth.confirm_password')}}" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 text-center">
                <h5 class="text-black">{{__('messages.level')}}</h5>
            </div>
            <div class="row col-12">
                @foreach($levels as $level)
                    <div class="col-4 text-right">
                        <div class="form-check form-check-inline">
                            <input type="radio" id="level{{$level->id}}" name="level" class="form-check-input" value="{{$level->id}}">
                            <label class="form-check-label text-black" for="customRadio3">{{$level->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2"></div>
            <div class="col-8 mt-2 d-grid">
                <button type="submit" class="btn btn-lg btn-outline-primary rounded-pill">{{__('auth.register')}}</button>
            </div>
        </div>
    </form>                                       
@endsection