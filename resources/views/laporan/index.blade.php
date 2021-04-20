@extends('layouts.master')

@section('title')
    Buat Laporan
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Buat Laporan</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title" style="font-weight: bolder;"> </div>
                                <div class="alert alert-light">Membuat laporan pembayaran SPP dalam bentuk pdf.</div>
                                <a href="{{ url('/laporan/create') }}" class="btn btn-primary btn-rounded">Export to PDF</a>                 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection