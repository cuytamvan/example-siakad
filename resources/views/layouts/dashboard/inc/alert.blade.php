@if ($error = session()->get('error'))
<div class="alert alert-danger alert-dismissible fade show">
  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
    <i class="nc-icon nc-simple-remove"></i>
  </button>
  <span><b> Oopps - </b> {{ $error }}</span>
</div>
@endif

@if ($success = session()->get('success'))
<div class="alert alert-success alert-dismissible fade show">
  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
    <i class="nc-icon nc-simple-remove"></i>
  </button>
  <span><b> Success - </b> {{ $success }}</span>
</div>
@endif
