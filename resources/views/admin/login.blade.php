@extends('layouts.dashboard.login')

@section('content')
<form action="{{ route('admin.login') }}" method="post">
  @csrf
  <div class="row" style="margin-top: 10px;">
    <div class="col-3">
      <img src="{{ asset('assets/img/logo.png') }}">
    </div>

    <div class="col-9">
      <h4><b>SMK SIROJUL HUDA 1</b></h4>
    </div>
  </div>
  <p>Login Admin</p>
  <div class="form-group pt-2">
    <input type="text" name="username" class="form-control" placeholder="username *">
  </div>
  <div class="form-group pt-2">
    <input type="password" name="password" class="form-control" placeholder="password *">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection
