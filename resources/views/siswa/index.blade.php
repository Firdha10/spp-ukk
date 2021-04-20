@extends('layouts.master')

@section('title')
    Data Siswa
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Data Siswa</h1>
                </div>
                <div class="section-body">
                    <div class="content-body table">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.flash-message')
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Siswa</h4>
                                        <div class="card-header-action">
                                        <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                            <a class="btn btn-sm btn-primary" href="{{ route('siswa.create') }}" title="Tambah Data"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-siswa" class="display table-striped table-bordered" style="width:100%; text-align:center;">
                                            <thead style="">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NISN</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Tanggal Ditambahkan</th>
                                                    @if(auth()->user()->level == 'admin')
                                                    <th>Aksi</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td style="text-transform: capitalize;">{{$data->nama}}</td>
                                                        <td>{{$data->nisn}}</td>
                                                        <td>{{$data->kelas->kelas}}</td>
                                                        <td>{{$data->jurusan->jurusan}}</td>
                                                        <td>{{$data->created_at->format('d M, Y')}}</td>
                                                        @if(auth()->user()->level == 'admin')
                                                        <td>
                                                            <div class="btn-group">
                                                                <a type="submit" class="btn btn-sm btn-info text-white" href="{{ route('siswa.edit',  ['id' => $data["id"]]) }}"><i class="fas fa-pencil-alt"></i></a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <form method="post" class="delete_form " action="{{route('siswa.destroy',$data['id'])}}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button  class="btn btn-sm btn-danger" id="btn-delete"  ><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                            <div class="btn-group">
                                                                <a href="{{ route( 'siswa.show' ,['id' => $data->id]) }}" class="btn btn-sm btn-success text-white"><i class="fas fa fa-file"></i></a>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

@section('js')
<script>
    $(function () {
        $("#table-siswa").DataTable();
    });
    $(function(){ 
        $("form.delete_form button").click(function(e) {
            e.preventDefault();
            var form = $(this).parent();
            Swal.fire({
                title: 'Hapus?',
                text: "Data Tidak Dapat kembali!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
            if (result.value) {
                Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data Terhapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                form.submit();
            }
        });
            
        });
    });
</script>
@endsection