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
          @include('layouts.dashboard.inc.alert')
          <div class="row">
            @csrf
            <div class="form-group col-12 col-sm-6">
              <label>Nama kelas</label>
              <input type="text" class="form-control" name="name" value="{{ $data->name ?? '' }}">
            </div>
            <div class="form-group col-12 col-sm-6">
              <label>Tahun ajaran</label>
              <select name="school_year_id" class="form-control">
                @foreach ($schoolYears as $r)
                <option value="{{ $r->id }}" {{ ($data->school_year_id ?? '') === $r->id ? 'selected' : '' }}>{{ $r->from_year }} - {{ $r->to_year }}</option>
                @endforeach
              </select>
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
