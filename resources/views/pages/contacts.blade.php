@extends('cell')
@section('list')
<div class="row">
    @if($isSent)<div class="col-12 text-center" style="background:yellowgreen; font:bold normal 17px sans-serif; padding:20px"><i class="fa fa-check"></i> сообщение отправлено</div>@endif
    <div class="container-fluid p-0 m-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">{{ $headers['title'] }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('feedback') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Сообщение:</label>
                                <div class="col-md-6">
                                    <textarea id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" rows="7" required>{{ old('text') }}</textarea>
                                    @if ($errors->has('text'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('text') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Ваше Имя:</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Ваша Почта: *</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Введите сумму:</label>
                                <div class="col-sm-5" style="max-width:35%">
                                    <input id="name" type="text" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" placeholder="3 + 2 = ..." required>
                                    @if ($errors->has('captcha'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('captcha') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer p-3">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-xs-12">
                            * Администрация обязуется не передавать адрес Вашей электронной почты
                            третьим лицам и использовать его исключительно для обратной связи
                            с Вами и не использовать его в рекламных, комерческих, или других целях
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection