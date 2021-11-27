<ul class="nav">
  <li class="{{ Route::is('teacher.dashboard') ? 'active' : '' }}">
    <a href="{{ route('teacher.dashboard') }}">
      <i class="nc-icon nc-bank"></i>
      <p>Dashboard</p>
    </a>
  </li>
  <li class="{{ Route::is('teacher.scores.*') ? 'active' : '' }}">
    <a href="{{ route('teacher.scores.index') }}">
      <i class="nc-icon nc-diamond"></i>
      <p>Nilai</p>
    </a>
  </li>
</ul>
