@extends('layouts.login')

@section('css')
<style>
.invalid-feedback{
    color:#002442;
}

.input-group label.error{
    color:#002442;
}

.card{
    margin-top: -19.5px;
    background:#e10000;
    color:#002442;
    box-shadow: 0px 0px 20px 0px #ff0000;
}

#sign_in .input-group span i{
    font-size: 2em;
    color:#dadada;
    /* color:#19314D; */
}

#sign_in .form-line input{
    padding: 10px;
}

#sign_in .msg{
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    font-weight: bold;
    color:#dadada;
}

.logo{
    box-shadow: 0px 0px 20px 0px #ff0000;
    background:#e10000;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; 
    padding: 5px;
}

.login-page .login-box .logo a{
    color:#dadada;
    font-family: 'Courier New', Courier, monospace;
    font-weight: 600;
}

.logo_inst{
    width: 120;
    height: 100px;
    border-radius: 50%;
}

</style>
@endsection

@section('content')

<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">{{$empresa->name}}</a>
        <img src="{{asset('imgs/empresa/'.$empresa->logo)}}" class="logo_inst" alt="">
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="msg">Escribe tu usuario y contraseña</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Usuario" required autofocus>
                    </div>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        <button class="btn btn-block bg-blue waves-effect" type="submit">ACCEDER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
