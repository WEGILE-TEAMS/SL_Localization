<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Register') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>{{ __('messages.Register') }}</h2>

    <div class="mb-3">
        <a href="{{ route('register', ['lang' => 'en']) }}" class="btn btn-secondary">{{ __('English') }}</a>
        <a href="{{ route('register', ['lang' => 'ko']) }}" class="btn btn-secondary">{{ __('Korean') }}</a>
        <a href="{{ route('register', ['lang' => 'id']) }}" class="btn btn-secondary">{{ __('Indonesian') }}</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register', ['lang' => $lang]) }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('messages.Name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('messages.Email address') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('messages.Password') }}</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('messages.Confirm Password') }}</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.Register') }}</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
