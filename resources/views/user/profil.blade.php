@extends('layouts.master')
@section('title')
  Profile
@endsection
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, 
                    @if($data->level == 'siswa')
                        {{$data->siswas->nama}}
                    @elseif($data->level == 'petugas')
                        {{$data->petugas->nama}}
                    @else
                        Admin
                    @endif
                </h2>
                <p class="section-lead">
                    Ubahlah informasi tentang dirimu di halaman ini.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">                     
                                <a href={{isset(auth()->user()->gambar) ? asset('pengguna/' . auth()->user()->gambar) : asset('assets/img/avatar/avatar-1.png')}}>
                                    <img alt="image" src="{{isset(auth()->user()->gambar) ? asset('pengguna/' . auth()->user()->gambar) : asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture" style="width:150px; height:150px">
                                </a>
                                <div class="profile-widget-items"></div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">
                                    @if($data->level == 'siswa')
                                        {{$data->siswas->nama}}
                                    @elseif($data->level == 'petugas')
                                        {{$data->petugas->nama}}
                                    @else
                                        Admin
                                    @endif
                                    <div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div>
                                        @if($data->level == 'admin')
                                            Admin
                                        @elseif($data->level == 'siswa')
                                            Siswa
                                        @elseif($data->level == 'petugas')
                                            Petugas
                                        @else

                                        @endif
                                    </div>   
                                    <div><h5>{{$data->email}}</h5></div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="font-weight-bold mb-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        @include('layouts.flash-message')
                        <div class="card">
                            <form action="{{route('admin.update.profil', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
                                <h6 style="margin-left:20px; margin-top:20px;">Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>E-Mail*</label>
                                            <input type="email" class="form-control" required name="email" value="{{ $data->email }}" >
                                            <div class="invalid-feedback">
                                                Harap untuk mengisi email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Foto*</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" id= "gambar" name= "gambar" class="custom-file-input" id="inputGroupFile01" value="{{isset($insert) ? $insert->gambar : ''}}">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script>
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection