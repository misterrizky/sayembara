<x-auth-layout title="Selamat Datang">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <a href="../../demo1/dist/index.html" class="mb-12 d-none">
            <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
        </a>
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <div id="page_login">
                <form class="form w-100" novalidate="novalidate" id="form_login">
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Masuk</h1>
                        <div class="text-gray-400 fw-bold fs-4">Baru disini ?
                        <a href="javascript:void(0);" onclick="auth_content('page_register');" class="link-primary fw-bolder">Buat sebuah akun</a></div>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">ID Pengguna</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="id_pengguna" id="id_pengguna" autocomplete="off" data-login="1" />
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Kata Sandi</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" name="kata_sandi" autocomplete="off" data-login="2" />
                    </div>
                    <div class="form-group row mb-10">
                        <div class="col-6">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Captcha</label>
                            <br>
                            <span class="captchal">{!! captcha_img() !!}</span>
                            <button type="button" onclick="reload_captcha();" class="btn btn-danger">
                            &#x21bb;
                            </button>
                        </div>
                        <div class="col-6">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right"></label>
                            <input type="text" class="form-control" placeholder="Masukkan Captcha" data-login="3" name="captchal">
                        </div>
                    </div>
                    <div class="text-center">
                        <button id="tombol_login" onclick="handle_post('#tombol_login','#form_login','{{route('web.auth.login')}}');" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Masuk</span>
                            <span class="indicator-progress">Harap tunggu...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
            <div id="page_register">
                <form class="form w-100" novalidate="novalidate" id="form_register">
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Daftar</h1>
                        <div class="text-gray-400 fw-bold fs-4">Sudah punya akun ?
                        <a href="javascript:void(0);" onclick="auth_content('page_login');" class="link-primary fw-bolder">Masuk disini</a></div>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">Nama Lengkap</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" id="nama_lengkap" name="nama_lengkap" autocomplete="off" data-register="1" />
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">No Handphone</label>
                        <input class="form-control form-control-lg form-control-solid" type="tel" max="13" name="no_handphone" autocomplete="off" data-register="2" />
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" data-register="3" />
                    </div>
                    <div class="form-group row mb-10">
                        <div class="col-6">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Captcha</label>
                            <br>
                            <span class="captchar">{!! captcha_img() !!}</span>
                            <button type="button" onclick="reload_captcha();" class="btn btn-danger">
                            &#x21bb;
                            </button>
                        </div>
                        <div class="col-6">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right"></label>
                            <input type="text" class="form-control" placeholder="Masukkan Captcha" name="captchar" data-register="4">
                        </div>
                    </div>
                    <div class="text-center">
                        <button onclick="handle_post('#tombol_register','#form_register','{{route('web.auth.register')}}');" id="tombol_register" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Daftar</span>
                            <span class="indicator-progress">Harap tunggu...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('custom_js')
    <script type="text/javascript">
        auth_content('page_login');
        function reload_captcha(){
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captchal").html(data.captcha);
                    $(".captchar").html(data.captcha);
                }
            });
        }
    </script>
    @endsection
</x-auth-layout>