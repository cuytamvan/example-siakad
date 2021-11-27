@extends('layouts.dashboard.app', [
  'title' => $title,
  'type' => 'admin'
])

@section('content')
<div class="row">
  <div class="col-12 col-sm-6">
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
            <div class="form-group col-12 col-sm-6">
              <label>Nama Test</label>
              <input type="text" class="form-control" name="name" value="{{ $data->name ?? '' }}">
            </div>
            <div class="form-group col-12 col-sm-6">
              <label>Urutan</label>
              <input type="number" class="form-control" name="sort" maxlength="4" value="{{ $data->sort ?? '' }}">
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
