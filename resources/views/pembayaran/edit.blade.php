@extends('layouts.master')

@section('title')
    Ubah Data Pembayaran
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Ubah Data Pembayaran</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Ubah Data Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                            <br><br>
                            <form action="{{ route('pembayaran.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>NISN*</p>
                                            <input type="text" class="form-control" required name="nisn" value="{{$data->siswa->nisn}}" >
                                            @if ($errors->has('nisn'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nisn') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>SPP Bulan*</p>
                                            <select class="form-control" name="spp_bulan">
                                                <option value="" >Silahkan Pilih</option>											
                                                <option value="januari" {{ $data->spp_bulan == 'januari' ? 'selected' : '' }}>Januari</option>
                                                <option value="februari" {{ $data->spp_bulan == 'februari' ? 'selected' : '' }}>Februari</option>
                                                <option value="maret" {{ $data->spp_bulan == 'maret' ? 'selected' : '' }}>Maret</option>
                                                <option value="april" {{ $data->spp_bulan == 'april' ? 'selected' : '' }}>April</option>
                                                <option value="mei" {{ $data->spp_bulan == 'mei' ? 'selected' : '' }}>Mei</option>
                                                <option value="juni" {{ $data->spp_bulan == 'juni' ? 'selected' : '' }}>Juni</option>
                                                <option value="juli" {{ $data->spp_bulan == 'juli' ? 'selected' : '' }}>Juli</option>
                                                <option value="agustus" {{ $data->spp_bulan == 'agustus' ? 'selected' : '' }}>Agustus</option>
                                                <option value="september" {{ $data->spp_bulan == 'september' ? 'selected' : '' }}>September</option>
                                                <option value="oktober" {{ $data->spp_bulan == 'oktober' ? 'selected' : '' }}>Oktober</option>
                                                <option value="november" {{ $data->spp_bulan == 'november' ? 'selected' : '' }}>November</option>
                                                <option value="desember" {{ $data->spp_bulan == 'desember' ? 'selected' : '' }}>Desember</option>
                                            </select>
                                            @if ($errors->has('spp_bulan'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('spp_bulan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p>Jumlah Bayar*</p>
                                            <input type="text" class="form-control" required name="jumlah_bayar" value="{{$data->jumlah_bayar}}" >
                                            @if ($errors->has('jumlah_bayar'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('jumlah_bayar') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
