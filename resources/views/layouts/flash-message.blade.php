@php
$warna = session()->get('type') == 'success' ? '#6777ef' : '#F44336';
@endphp
<div class="form-group">
  @if (session()->has('message'))
    <div class="alert alert-{{ session()->get('type') == 'success' ? 'success' : 'danger' }}" role="alert" style="background: {{$warna}} !important; color: white;">
      {{ session()->get('message') }} 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if($errors->isNotEmpty())
    <div class="alert alert-danger" role="alert" style="background: #F44336 !important; color: white;">
      <small><strong>Kesalahan!</strong></small>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <ul>
        @foreach($errors->all() as $error)
        <li class="mb-1"><small>{{ $error }}</small></li>
        @endforeach
      </ul>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        Please check the form below for errors
    </div>
  @endif
</div>