@extends('layouts.template')


@section('content')
    <a href="{{ route('user.index') }}" class="btn btn-primary mb-3">
        <span class="tf-icons bx bx-arrow-back"></span>&nbsp; Kembali
    </a>
<!-- Basic Layout -->
{!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xl-10">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <small class="text-muted float-end">*Password user akan kami kirim lewat email yang didaftarkan</small>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="select2" class="form-label">Pilih Kariwanan</label>
                        {!! Form::select('dosen_id', $dosen ,null, array('class' => ['form-control', 'select2'], 'placeholder' => 'Pilih Dosen')) !!}
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Email <span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge">
                            {!! Form::text('email', null, array('placeholder' => 'Email Karyawan','class' => 'form-control')) !!}
                        </div>
                        <div class="form-text">Bisa pakai huruf, angka & titik</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Hak Akses</label>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        <small class="text-muted float-end">*(click + ctrl) untuk memilih lebih dari satu hak akses</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>


{!! Form::close() !!}

@if($refund = Session::has('password-show'))
    <div class="row d-flex justify-content-center my-4">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Detail User</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        Password hanya akan ditampilan 1 kali !!. copy password agar tidak lupa ya
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ Session::get('user')->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ Session::get('user')->email }}</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ Session::get('user')->password }}</td>
                        </tr>
                        <tr>
                            <td>Hak Akses</td>
                            <td>:</td>
                            <td>
                                @foreach(Session::get('user')->roles  as $role)
                                    <span class="badge bg-info">{{ $role->name }} </span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection


@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
    <!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
