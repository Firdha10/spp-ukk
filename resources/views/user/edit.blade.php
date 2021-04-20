@extends('layouts.master')
@section('title')
    Edit Pengguna
@endsection
@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Edit Pengguna</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                            <br><br>
                            <form action="{{ route('user.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Email*</p>
                                            <input type="email" class="form-control" required name="email" value="{{ $data->email }}" >
                                        </div>
                                        <div class="form-group">
                                            <p>Role*</p>
                                            <select class="form-control" name="level" required="">
                                                <option value=""></option>
                                                <option value="admin" {{$data->level === "admin" ? "selected" : ""}}>Admin</option>
                                                <option value="siswa" {{$data->level === "siswa" ? "selected" : ""}}>Siswa</option>
                                                <option value="petugas" {{$data->level === "petugas" ? "selected" : ""}}>Petugas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Foto*</p>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" id= "gambar" name= "gambar" class="custom-file-input" id="inputGroupFile01" value="{{isset($data) ? $data->gambar : ''}}">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" required name="password" value="{{$data->password}}" >
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section> 
        </div>
    </div>
@endsection
@section('js')
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection