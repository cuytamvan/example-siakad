<ul class="nav">
  <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
    <a href="{{ route('admin.dashboard') }}">
      <i class="nc-icon nc-layout-11"></i>
      <p>Dashboard</p>
    </a>
  </li>
  <li class="{{ Route::is('admin.school-years.*') ? 'active' : '' }}">
    <a href="{{ route('admin.school-years.index') }}">
      <i class="nc-icon nc-box"></i>
      <p>Tahun Ajaran</p>
    </a>
  </li>
  <li class="{{ Route::is('admin.class-rooms.*') ? 'active' : '' }}">
    <a href="{{ route('admin.class-rooms.index') }}">
      <i class="nc-icon nc-bank"></i>
      <p>Kelas</p>
    </a>
  </li>
  <li class="{{ Route::is('admin.subjects.*') ? 'active' : '' }}">
    <a href="{{ route('admin.subjects.index') }}">
      <i class="nc-icon nc-paper"></i>
      <p>Mata pelajaran</p>
    </a>
  </li>
  <li>
    <a href="#!">
      <i class="nc-icon nc-badge"></i>
      <p>Guru</p>
    </a>
  </li>
  <li class="{{ Route::is('admin.students.*') ? 'active' : '' }}">
    <a href="{{ route('admin.students.index') }}">
      <i class="nc-icon nc-badge"></i>
      <p>Murid</p>
    </a>
  </li>
</ul>
