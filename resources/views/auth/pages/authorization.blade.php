@extends('auth.layouts.default')

{{--*/ $title = 'Authorize' /*--}}

@section('body')
    <div class="login-block">
        <h1> {{ $client->getName() }} want you to authorize access </h1>
        <form method="post" action="{{ route('oauth.authorization.post', $params) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" name="client_id" value="{{ $params['client_id'] }}" />
            <input type="hidden" name="redirect_uri" value="{{ $params['redirect_uri'] }}" />
            <input type="hidden" name="response_type" value="{{ $params['response_type'] }}" />
            <input type="hidden" name="state" value="{{ $params['state'] }}" />

            <button type="submit" value="1" name="approve">Approve</button>
            <button type="submit" value="1" name="deny">Deny</button>
        </form>
    </div>
@stop