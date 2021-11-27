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
              <label>Dari tahun</label>
              <input type="number" class="form-control" name="from_year" maxlength="4" value="{{ $data->from_year ?? '' }}">
            </div>
            <div class="form-group col-12 col-sm-6">
              <label>Ke tahun</label>
              <input type="number" class="form-control" name="to_year" maxlength="4" value="{{ $data->to_year ?? '' }}">
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
