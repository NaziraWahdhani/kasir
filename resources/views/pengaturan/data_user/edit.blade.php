@extends('layouts.main')
@section('content')
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">Data User</h4>
            <i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <!-- BEGIN Breadcrumb -->
                <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item">
                        <div class="breadcrumb-icon">
                            <i data-feather="home"></i>
                        </div>
                        <span class="breadcrumb-text">Dashboard</span> </a>
                    <div class="breadcrumb-item">
                        <span class="breadcrumb-text">Pengaturan</span>
                    </div>
                    <a href="{{ route('pengaturan.data-user') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Data User</span> </a>
                    <div class="breadcrumb-item">
                        <span class="breadcrumb-text">Create</span>
                    </div>
                </div>
                <!-- END Breadcrumb -->
            </div>
            <div class="header-wrap">
                <button class="btn btn-label-info btn-icon ml-2" id="fullscreen-trigger" data-toggle="tooltip" title="Toggle fullscreen" data-placement="left">
                    <i class="fa fa-expand fullscreen-icon-expand"></i>
                    <i class="fa fa-compress fullscreen-icon-compress"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- END Header Holder -->
    <div class="content">
        <div class="container-fluid">
            @include('layouts.partials.message')
            @include('layouts.partials.formRequestErrors')
            <form action="{{ route('pengaturan.data-user.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="portlet">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $data->email }}" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" value="{{ $data->password }}" class="form-control" id="password" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', 'togglePasswordIcon1')">
                                                <i id="togglePasswordIcon1" class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" value="{{ $data->password }}" class="form-control" id="password_confirmation" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation', 'togglePasswordIcon2')">
                                                <i id="togglePasswordIcon2" class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small id="password-error" class="text-danger" style="display: none;">Konfirmasi password tidak cocok!</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="role_id">Hak Akses</label> <select class="form-control" name="role_id" id="role_id">
                                    <option selected>Pilih</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $data->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('pengaturan.data-user') }}">
                                <button type="button" class="btn btn-secondary">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function togglePassword(inputId, iconId) {
            var passwordInput = document.getElementById(inputId);
            var icon = document.getElementById(iconId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        document.querySelector("form").addEventListener("submit", function (e) {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("password_confirmation").value;
            let errorMessage = document.getElementById("password-error");

            if (password !== confirmPassword) {
                e.preventDefault(); // Mencegah submit form
                errorMessage.style.display = "block"; // Tampilkan pesan error
            } else {
                errorMessage.style.display = "none"; // Sembunyikan pesan error jika cocok
            }
        });

        // Validasi langsung saat mengetik
        document.getElementById("password_confirmation").addEventListener("input", function () {
            let password = document.getElementById("password").value;
            let confirmPassword = this.value;
            let errorMessage = document.getElementById("password-error");

            if (password !== confirmPassword) {
                errorMessage.style.display = "block"; // Tampilkan pesan error
            } else {
                errorMessage.style.display = "none"; // Sembunyikan pesan error
            }
        });
    </script>
@endpush
