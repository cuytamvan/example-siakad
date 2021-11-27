@extends('layouts.dashboard.login')

@section('content')
<form action="{{ route('teacher.login') }}" method="post">
  @csrf
  <h4>Login Guru</h4>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
  <div class="form-group pt-2">
    <input type="text" name="username" class="form-control" placeholder="username *">
  </div>
  <div class="form-group pt-2">
    <input type="password" name="password" class="form-control" placeholder="password *">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection

