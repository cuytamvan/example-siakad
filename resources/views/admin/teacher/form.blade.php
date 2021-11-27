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
              <label>Nama Depan</label>
              <input type="text" class="form-control" name="first_name" value="{{ $data->first_name ?? '' }}">
            </div>
            <div class="form-group col-12 col-sm-6 col-md-4">
              <label>Nama Belakang</label>
              <input type="text" class="form-control" name="last_name" value="{{ $data->last_name ?? '' }}">
            </div>
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label>Mata Pelajaran</label>
              <select name="subject_id" class="form-control">
                @foreach ($subjects as $r)
                <option value="{{ $r->id }}" {{ ($data->subject_id ?? null) === $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group col-12">
              <label>Alamat</label>
              <textarea class="form-control" name="address">{{ $data->address ?? '' }}</textarea>
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
