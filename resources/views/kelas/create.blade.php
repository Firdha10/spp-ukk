@extends('layouts.master')

@section('title')
    Tambah Data Kelas
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Tambah Data Kelas</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Data Kelas</h4>
                        </div>
                            <div class="card-body">
                                <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                <br><br>
                                <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p>Kelas*</p>
                                                <input type="text" placeholder="Contoh : VIII/8" class="form-control" required name="kelas" value="{{ old('kelas') }}" >
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
