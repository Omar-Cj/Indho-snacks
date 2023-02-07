<html lang="en">

<head>
    @php
        $settings = DB::table('setting')
            ->where('id', 1)
            ->first();
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Passowrd</title>
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link rel="stylesheet" href="{{ asset('burger/frontend/bootstrap.css') }}">
    <link href="{{ asset('burger/frontend/signin.css') }}" rel="stylesheet">
</head>

<body>
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <a href="{{ route('website.home') }}">
                <img class="mb-4" src="{{ asset('public/upload/web/'.$settings->logo ) }}" alt="" width="100%" height="150">
            </a>
            @if (!isset($msg))
                <form action="{{ url('resetnewpwd') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="code" value="{{ $code }}" />
                    <input type="hidden" name="id" value="{{ $id }}" />
                    <div class="form-group">
                        <label for="email">{{ __('messages.new_pwd') }}:</label>
                        <input type="password" required class="form-control" id="npwd"
                            placeholder="{{ __('messages.en_new_pwd') }}" name="npwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">{{ __('messages.r_ent_pwd') }}:</label>
                        <input type="password" required class="form-control" id="rpwd"
                            placeholder="{{ __('messages.e_r_pwd') }}" name="rpwd"
                            onchange="checkbothpwd(this.value)">
                    </div>
                    <button type="submit" class="btn btn-default">{{ __('messages.reset') }}</button>
                </form>
            @endif
            @if (isset($msg))
                <h3>{{ $msg }}</h3>
            @endif
        </div>
    </div>
</body>

</html>
