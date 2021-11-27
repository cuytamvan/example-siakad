@extends('layouts.dashboard.app', [
  'title' => $title,
  'type' => 'admin'
])

@section('content')
<div class="card">
  <div class="card-body">
    @include('layouts.dashboard.inc.alert')
    <div class="text-right">
      <a href="{{ route($route.'create') }}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Aksi</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Kelas</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $r)
        <tr>
          <td>
            <a href="{{ route($route.'edit', $r->id) }}" class="btn btn-sm btn-success">Edit</a>
            <form action="{{ route($route.'destroy', $r->id) }}" method="POST" class="d-inline-block">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </td>
          <td>{{ $r->nis }}</td>
          <td>{{ $r->first_name }} {{ $r->last_name }}</td>
          <td>{{ $r->address }}</td>
          <td>{{ $r->class_room->name ?? '-' }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
