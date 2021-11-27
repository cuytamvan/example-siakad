@extends('layouts.dashboard.app', [
  'title' => 'Nilai',
  'type' => 'teacher'
])

@section('content')
<div class="card">
  <div class="card-body">
    @include('layouts.dashboard.inc.alert')
  </div>
  @if (isset($query['school_year_id']) && isset($query['class_room_id']) && isset($query['test_type_id']))
    <form action="{{ route($route.'index') }}" method="post">
      @csrf
      <div class="card-body">
        <input type="hidden" name="test_type_id" value="{{ $query['test_type_id'] }}">
        <input type="hidden" name="class_room_id" value="{{ $query['class_room_id'] }}">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama</th>
              <th style="width: 160px;">Nilai</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @foreach ($students as $i => $r)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $r->nis }}</td>
              <td>{{ $r->first_name }} {{ $r->last_name }}</td>
              <td>
                <div class="form-group" style="width: 150px;">
                  <input type="hidden" name="scores[{{ $i }}][student_id]" value="{{ $r->id }}">
                  <input type="text" name="scores[{{ $i }}][value]" class="form-control" value="{{ $scores[$r->id] ?? 0 }}">
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Simpan Nilai</button>
        </div>
      </div>
    </form>
  @else
  <form>
    <div class="card-body row px-4">
      <div class="form-group col-12 col-sm-6 col-md-4">
        <label>Tahun ajaran</label>
        <select name="school_year_id" id="schoolYearId" class="form-control" onchange="renderClassRom()">
          @foreach ($schoolYears as $r)
          <option value="{{ $r->id }}">{{ $r->from_year }} - {{ $r->to_year }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-12 col-sm-6 col-md-4">
        <label>Kelas</label>
        <select name="class_room_id" id="classRoomId" class="form-control"></select>
      </div>
      <div class="form-group col-12 col-sm-6 col-md-4">
        <label>Jenis Ujian</label>
        <select name="test_type_id" id="classRoomId" class="form-control">
          @foreach ($testTypes as $r)
          <option value="{{ $r->id }}">{{ $r->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 text-right">
        <button class="btn btn-primary" type="submit">Cari</button>
      </div>
    </div>
  </form>
  @endif
</div>
@endsection

@section('script')
<script>
const schoolYears = @json($schoolYears);
const classRooms = @json($classRooms);

renderClassRom()
function renderClassRom() {
  const schoolYearId = $('#schoolYearId').val();
  let html = '';
  classRooms.filter(r => r.school_year_id === parseInt(schoolYearId)).map(r => {
    html += `<option value="${r.id}">${r.name}</option>`;
  });
  $('#classRoomId').html(html);
}
</script>
@endsection
