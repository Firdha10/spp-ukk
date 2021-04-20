@extends('layouts.master')

@section('title')
    Data Kelas
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Data Kelas</h1>
                </div>
                <div class="section-body">
                    <div class="content-body table">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.flash-message')
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Kelas</h4>
                                        <div class="card-header-action">
                                        <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                            <a class="btn btn-sm btn-primary" href="{{ route('kelas.create') }}" title="Tambah Data"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive">
                                        <table id="table-kelas" class="display table-striped table-bordered" style="width:100%; text-align:center;">
                                            <thead style="">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kelas</th>
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
                                                        <td>{{$data->kelas}}</td>
                                                        <td>{{$data->created_at->format('d M, Y')}}</td>
                                                        @if(auth()->user()->level == 'admin')
                                                        <td>
                                                            <div class="btn-group">
                                                                <a type="submit" class="btn btn-sm btn-info text-white" href="{{ route('kelas.edit',  ['id' => $data["id"]]) }}"><i class="fas fa-pencil-alt"></i></a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <form method="post" class="delete_form " action="{{route('kelas.destroy',$data['id'])}}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button  class="btn btn-sm btn-danger" id="btn-delete"  ><i class="fa fa-trash"></i></button>
                                                                </form>
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
        $("#table-kelas").DataTable();
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