@extends('layouts.master')
@section('title')
  Dashboard
@endsection
@section('content')
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
      <section class="section">
        <div class="section-header">
          <h1>Dashboard</h1>
        </div>
        <div class="section-body">
          <h2 style="text-transform: capitalize;">welcome 
            @if(auth()->user()->level == 'admin')
            {{(auth()->user()->admin->nama)}}
            @elseif(auth()->user()->level == 'siswa')
            {{(auth()->user()->siswas->nama)}}
            @elseif(auth()->user()->level == 'petugas')
            {{(auth()->user()->petugas->nama)}}
            @else
            Admin
            @endif
          </h2>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <div class="card-title">History Pembayaran</div>
                      @foreach($pembayaran as $value)
                          <div class="border-top">
                              <div class="float-right">
                                  <i class="mdi mdi-check text-success"></i> 
                                  {{ $value->created_at->format('d M, Y') }}
                              </div>
                              <div class="mt-4 text-uppercase">
                                  {{ $value->siswa->nama .' - '. $value->siswa->kelas->kelas .' - ' .$value->siswa->jurusan->jurusan}}
                              </div>
                              <div>SPP Bulan <b class="text-capitalize">{{ $value->spp_bulan }}</b></div>
                              <div>Nominal SPP Rp.{{ $spp = $value->siswa->spp->nominal }}</div>
                              <div>Bayar Rp.{{ $bayar = $value->jumlah_bayar }}</div>
                              <div>Tunggakan Rp.{{ $spp - $bayar }}</div>                        
                          </div>
                      @endforeach 
                      @if(auth()->user()->level == 'admin')
                        @if($pembayaran->lastPage() != 1)
                            <div class="btn-group float-right">		
                                <a href="{{ $pembayaran->previousPageUrl() }}" class="btn btn-success">
                                    <i class="mdi mdi-chevron-left"></i>
                                </a>
                                @for($i = 1; $i <= $pembayaran->lastPage(); $i++)
                                    <a class="btn btn-success {{ $i == $pembayaran->currentPage() ? 'active' : '' }}" href="{{ $pembayaran->url($i) }}">{{ $i }}</a>
                                @endfor
                                <a href="{{ $pembayaran->nextPageUrl() }}" class="btn btn-success">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                            </div>
                        @endif
                      @endif
                      @if(auth()->user()->level == 'petugas')
                        @if($pembayaran->lastPage() != 1)
                            <div class="btn-group float-right">		
                                <a href="{{ $pembayaran->previousPageUrl() }}" class="btn btn-success">
                                    <i class="mdi mdi-chevron-left"></i>
                                </a>
                                @for($i = 1; $i <= $pembayaran->lastPage(); $i++)
                                    <a class="btn btn-success {{ $i == $pembayaran->currentPage() ? 'active' : '' }}" href="{{ $pembayaran->url($i) }}">{{ $i }}</a>
                                @endfor
                                <a href="{{ $pembayaran->nextPageUrl() }}" class="btn btn-success">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                            </div>
                        @endif
                      @endif
                      @if(count($pembayaran) == 0)
                          <div class="text-center">Tidak ada history pembayaran</div>
                      @endif
                  
                  </div>
              </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection