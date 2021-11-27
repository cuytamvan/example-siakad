@extends('layouts.dashboard.app', [
  'title' => $title,
  'type' => 'admin'
])

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5>{{ isset($data) ? 'Edit' : 'Tambah' }} {{ $title }}</h5>
      </div>

      @if (isset($data))
      <form action="{{ route($route.'update', $data->id) }}" method="POST">
      @method('PUT')
      @else
      <form action="{{ route($route.'store') }}" method="POST">
      @endif
        <div class="card-body px-4">
          <div class="row">
            @csrf
            <div class="form-group col-12 col-sm-6 col-md-4">
              <label>Username</label>
              <input type="text" class="form-control" name="username" value="{{ $data->username ?? '' }}">
            </div>
            <div class="form-group col-12 col-sm-6 col-md-4">
              <label>Nama</label>
              <input type="text" class="form-control" name="name" value="{{ $data->name ?? '' }}">
            </div>
            <div class="form-group col-12 col-sm-6 col-md-4">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
