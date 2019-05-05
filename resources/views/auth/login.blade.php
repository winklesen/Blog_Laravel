@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                {{--  <div class="card-header">{{ __('Login') }}</div>  --}}
                <div class="card-body">                    
                    <h2 class="font-weight-bold">User Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf            
                        {{--  Email  --}}
                        <div class="form-group input-group col-12 mt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{--  Password  --}}
                        <div class="form-group input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>                         

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary col-11 ">
                                    {{ __('Login') }}
                                </button>                                
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col-md-12 d-flex justify-content-between">
                                <div class="form-check mt-2 ml-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{--  {{ __('Remember Me') }}                                          --}}
                                        <small>Keep me signed in</small>
                                    </label>                                                                        
                                </div>                                
                                <div>
                                    @if (Route::has('password.request'))                                
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            <small>
                                                {{ __('Forgot Your Password?') }}
                                            </small>                                            
                                        </a>                                                                                                    
                                    @endif                                
                                </div>
                            </div>
                        </div>            
                    </form>

                    <div class="text-center mt-4">
                        <span class="text-muted"><small>Dont have an account?</small></span>
                        <span>
                            <a href="{{ route('register') }}">Sign Up</a>
                        </span>
                    </div>
                </div>
            {{--  </div>  --}}
        </div>
    </div>
</div>
@endsection