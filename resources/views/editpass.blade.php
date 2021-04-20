@extends('layouts.master')

@section('title')
    Ubah Password
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Ubah Password</h1>
                </div>
                <div id="app">
                    <section class="section">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-12">
                                @include('layouts.flash-message')
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>Ubah Password</h4>
                                        </div>
                                        <div class="card-body">
                                        <form action="{{route('update.pass', $user->id)}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                                <div class="form-group">

                                                    <label for="new_password">New Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                    <label for="password-confirm">Confirm New Password</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password-confirmation"  required autocomplete="new-password">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                    Update Password
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section> 
        </div>
    </div>
@endsection