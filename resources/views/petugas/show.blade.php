@extends('layouts.master')

@section('title')
    Detail Petugas
@endsection
@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Detail Petugas</h1>
                </div>
                <div class="section-body">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3 mt-3 ml-lg-3 mr-lg-3">
                                        <div class="col-lg-12">
                                            <h4 class="mb-5 mt-3 text-center"><strong>Detail Petugas</strong></h4>
                                            <div class="row justify-content-center mb-5 mt-3">
                                                <div class="col-lg-3 col-12">
                                                    <img src="{{isset($data->user->gambar) ? asset('pengguna/' . $data->user->gambar) : asset('assets/img/avatar/avatar-1.png')}}" alt="" style="width:200px; height:200px;">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-5">Nama</div>
                                                <div class="col-1 text-right">:</div>
                                                <div class="col-lg-6 col-5" style="text-transform:capitalize;">{{$data->nama}}</div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-5">Email</div>
                                                <div class="col-1 text-right">:</div>
                                                <div class="col-lg-6 col-5">{{$data->user->email}}</div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-5">Nomor Telepon</div>
                                                <div class="col-1 text-right">:</div>
                                                <div class="col-lg-6 col-5">{{$data->no_telp}}</div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-5">Nomor NIK/KTP</div>
                                                <div class="col-1 text-right">:</div>
                                                <div class="col-lg-6 col-5">{{$data->nik}}</div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-5">Alamat</div>
                                                <div class="col-1 text-right">:</div>
                                                <div class="col-lg-6 col-5">{{$data->alamat}}</div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-5">Jenis Kelamin</div>
                                                <div class="col-1 text-right">:</div>
                                                <div class="col-lg-6 col-5" style="text-transform:capitalize;">{{$data->jk}}</div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-5">Tanggal Ditambahkan</div>
                                                <div class="col-1 text-right">:</div>
                                                <div class="col-lg-6 col-5">{{$data->created_at}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection