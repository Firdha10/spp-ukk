@extends('layouts.master')

@section('title')
    Tambah Siswa
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Tambah Siswa</h1>
                </div>
                <div class="section-body">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Tambah Siswa</h4>
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
                                            <p>NISN*</p>
                                            <input type="text" autocomplete="off" placeholder="Masukkan NIS" class="form-control" required name="nisn" value="{{ old('nisn') }}" >
                                            @if ($errors->has('nisn'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nisn') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Alamat*</p>
                                            <input type="text" class="form-control" placeholder ="Masukkan Alamat Rumah" required name="alamat" value="{{ old('alamat') }}" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <p>Nomor Telepon*</p>
                                            <input type="number" placeholder="Masukkan Nomor Telepon" class="form-control" required name="no_telp" value="{{ old('no_telp') }}" >
                                            @if ($errors->has('no_telp'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('no_telp') }}</strong>
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
                                        <div class="form-group">
                                            <p>Kelas*</p>
                                            <select name="kelas_id" class="form-control">
                                                <option value=''>--- Pilih Kelas ---</option>
                                                @foreach($kelas as $kelas)
                                                    <option value="{{ $kelas['id'] }}"> {{$kelas->kelas}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Jurusan*</p>
                                            <select name="jurusan_id" class="form-control">
                                                <option value=''>--- Pilih Jurusan ---</option>
                                                @foreach($datas as $data)
                                                    <option value="{{ $data['id'] }}"> {{$data->jurusan}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p>SPP *</p>
                                            <select name="spp_id" class="form-control">
                                                <option value=''>--- Pilih Nominal SPP ---</option>
                                                @foreach($spp as $spp)
                                                    <option value="{{ $spp['id'] }}"> {{ 'Tahun '.$spp->tahun.' - '.'Rp.'.$spp->nominal }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat Akun Siswa</h4>
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
                                            <p>Foto</p>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id= "gambar" name= "gambar" class="custom-file-input" id="inputGroupFile01" value="{{isset($insert) ? $insert->gambar : ''}}">
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