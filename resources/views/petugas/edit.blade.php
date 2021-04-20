@extends('layouts.master')

@section('title')
    Ubah Data Petugas
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Ubah Data Petugas</h1>
                </div>
                <div class="section-body">
                    <form action="{{ route('petugas.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Ubah Data Petugas</h4>
                            </div>
                            <div class="card-body">
                                <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                <br><br>
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Nama Petugas*</p>
                                            <input type="text" class="form-control" required name="nama" value="{{$data->nama}}" >
                                            @if ($errors->has('nama'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>Alamat*</p>
                                            <input type="text" class="form-control" required name="alamat" value="{{$data->alamat}}" >
                                            @if ($errors->has('alamat'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('alamat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>No Telepon*</p>
                                            <input type="number" class="form-control" required name="no_telp" value="{{$data->no_telp}}" >
                                            @if ($errors->has('no_telp'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>No NIK/KTP*</p>
                                            <input type="number" class="form-control" required name="nik" value="{{$data->nik}}" >
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