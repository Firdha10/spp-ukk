@extends('layouts.master')

@section('title')
    Tambah Pembayaran
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Tambah Pembayaran</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Pembayaran</h4>
                        </div>
                            <div class="card-body">
                                <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                <br><br>
                                <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p>NISN Siswa*</p>
                                                <input type="text" placeholder= "Masukkan NISN Siswa" class="form-control" required name="nisn">
                                                @if ($errors->has('nisn'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nisn') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <p>SPP Bulan*</p>
                                                <select class="form-control" name="spp_bulan">
                                                    <option value="">Silahkan Pilih</option>											
                                                    <option value="januari">Januari</option>
                                                    <option value="februari">Februari</option>
                                                    <option value="maret">Maret</option>
                                                    <option value="april">April</option>
                                                    <option value="mei">Mei</option>
                                                    <option value="juni">Juni</option>
                                                    <option value="juli">Juli</option>
                                                    <option value="agustus">Agustus</option>
                                                    <option value="september">September</option>
                                                    <option value="oktober">Oktober</option>
                                                    <option value="november">November</option>
                                                    <option value="desember">Desember</option>
                                                </select>
                                                @if ($errors->has('spp_bulan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('spp_bulan') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <p>Jumlah Bayar*</p>
                                                <input type="text" placeholder= "Masukkan Jumlah Bayar Siswa" class="form-control" required name="jumlah_bayar">
                                                @if ($errors->has('jumlah_bayar'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('jumlah_bayar') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
