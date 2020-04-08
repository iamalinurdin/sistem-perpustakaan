@extends('frontend.templates.default')

@section('content')
  <div class="container">
    <h3>Login Page</h3>
    <form class="col s12" action="{{ route('register') }}" method="post">
      @csrf
      <div class="row">
        <!-- name -->
        <div class="input-field col s12">
          <i class="material-icons prefix">person</i>
          <input type="text" id="name" class="@error('name') invalid @enderror" name="name" value="{{ old('name') }}">
          <label for="name">Name</label>
          @error('name')
            <span class="helper-text" data-error="{{ $message }}"></span>
          @enderror
        </div>
        <!-- email -->
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input type="text" id="email" class="@error('email') invalid @enderror" name="email" value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
            <span class="helper-text" data-error="{{ $message }}"></span>
          @enderror
        </div>
        <!-- password -->
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input type="password" id="password" class="@error('email') invalid @enderror" name="password" value="{{ old('password') }}">
          <label for="password">Password</label>
          @error('password')
            <span class="helper-text" data-error="{{ $message }}"></span>
          @enderror
        </div>
        <!-- confirm password -->
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <label for="password">Password Confirm</label>
          @error('password_confirmation')
            <span class="helper-text" data-error="{{ $message }}"></span>
          @enderror
        </div>
        <!-- button -->
        <div class="input field right">
          <button class="waves-effect waves-light btn red accent-1">Login</button>
        </div>
      </div>
    </form>
  </div>
@endsection