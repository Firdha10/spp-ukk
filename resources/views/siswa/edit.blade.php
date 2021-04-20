@extends('layouts.master')

@section('title')
    Ubah Data Siswa
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Ubah Data Siswa</h1>
                </div>
                <div class="section-body">
                    <form action="{{ route('siswa.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Ubah Data Siswa</h4>
                            </div>
                            <div class="card-body">
                                <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                <br><br>
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Nama Siswa*</p>
                                            <input type="text" class="form-control" required name="nama" value="{{$data->nama}}" >
                                            @if ($errors->has('nama'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>NISN*</p>
                                            <input type="text" class="form-control" required name="nisn" value="{{$data->nisn}}" >
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
                                            <input type="text" class="form-control" required name="alamat" value="{{$data->alamat}}" >
                                            @if ($errors->has('alamat'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('alamat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>No Telepon*</p>
                                            <input type="number" class="form-control" required name="no_telp" value="{{$data->no_telp}}" >
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
                                                <option value=""></option>
                                                <option value="laki-laki" {{$data->jk === "laki-laki" ? "selected" : ""}}>Laki - Laki</option>
                                                <option value="perempuan" {{$data->jk === "perempuan" ? "selected" : ""}}>Perempuan</option>
                                            </select>
                                            @if ($errors->has('jk'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('jk') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>Jurusan*</p>
                                            <select required name="jurusan_id" class="form-control" value="{{ $data->jurusan_id }}">
                                                @foreach($jurusan as $jurusan)
                                                    <option value="{{ $jurusan['id'] }}" {{$jurusan->id == $data->jurusan_id ?  'selected' : ''}}> {{$jurusan->jurusan}} </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('jurusan_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('jurusan_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Kelas*</p>
                                            <select required name="kelas_id" class="form-control" value="{{ $data->kelas_id }}">
                                                @foreach($kelas as $kelas)
                                                    <option value="{{ $kelas['id'] }}" {{$jurusan->id == $data->kelas_id ?  'selected' : ''}}> {{$kelas->kelas}} </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('kelas_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('kelas_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>SPP*</p>
                                            <select required name="spp_id" class="form-control" value="{{ $data->spp_id }}">
                                                @foreach($spp as $spp)
                                                    <option value="{{ $spp->id }}" {{ $data->spp_id == $spp->id ? 'selected' : '' }}>{{ 'Tahun '.$spp->tahun.' - '.'Rp.'.$spp->nominal }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('spp_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('spp_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" required name="user_id" value="{{$data->user_id}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Ubah Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection