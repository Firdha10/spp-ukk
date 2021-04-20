@extends('layouts.master')

@section('title')
    Tambah Petugas
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Tambah Petugas</h1>
                </div>
                <div class="section-body">
                    <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Tambah Petugas</h4>
                            </div>
                            <div class="card-body">
                                <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                <br><br>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Nama*</p>
                                            <input type="text" placeholder="Masukkan Nama" class="form-control" required name="nama" value="{{ old('nama') }}" autocomplete="off" >
                                            @if ($errors->has('nama'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>Alamat*</p>
                                            <input type="text" class="form-control" placeholder ="Masukkan Alamat Rumah" required name="alamat" value="{{ old('alamat') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Nomor Telepon*</p>
                                            <input type="number" placeholder="Masukkan Nomor Telepon" class="form-control" required name="no_telp" value="{{ old('no_telp') }}" >
                                            @if ($errors->has('no_telp'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>Nomor NIK/KTP*</p>
                                            <input type="number" placeholder="Masukkan Nomor NIK/KTP" class="form-control" required name="nik" value="{{ old('nik') }}" >
                                            @if ($errors->has('nik'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nik') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Jenis Kelamin*</p>
                                            <select class="form-control" name="jk" required="">
                                                <option value="">--- Pilih Jenis Kelamin ---</option>
                                                <option value="laki-laki" >Laki - Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat Akun Petugas</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Email*</p>
                                            <input type="text" placeholder="Masukkan Email" class="form-control" required name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p>Foto*</p>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id= "gambar" required name= "gambar" class="custom-file-input" id="inputGroupFile01" value="{{isset($insert) ? $insert->gambar : ''}}">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Kirim Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop
