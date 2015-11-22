@extends('auth.layouts.default')

{{--*/ $title = 'Login' /*--}}

@section('body')
    <div class="login-block">
        <h1> {{ $title }} </h1>
        <form method="post" action="{{ route('auth.login.post') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="text" value="{{ old('username') }}" placeholder="Username" name="username" />
            <input type="password" placeholder="Password" name="password" />
            <button>Submit</button>
        </form>
    </div>
@stop