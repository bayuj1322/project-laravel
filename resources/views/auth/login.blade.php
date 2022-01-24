@extends("auth.index")

@section("title", "Login")

@section("content")
<div class="col-12">
    <form class="mt-3 mb-3" autocomplete="off">
        @csrf

        <div class="d-flex align-items-center mb-4">
            <img src="{{config('app.url')}}/assets/img/logo_sig.png" height="24" alt="SIG" class="ms-auto">
            <div class="d-block ms-3 me-auto">
                <h6 class="fw-bold mb-0">
                    Welcome to Portal ICT <br />
                    PT Semen Indonesia Group
                </h6>
            </div>
        </div>

        <div class="auth-text auth-message fs-14 fw-bold"></div>

        <div class="d-block mb-3">
            <div class="input-group mb-1">
                <span class="input-group-text bg-white ps-3">
                    <i class="ri-mail-line"></i>
                </span>
                <input type="email" class="form-control ps-0 pe-3 pt-3 pb-3 fs-14 shadow-none border-start-0" placeholder="Email" name="email">
            </div>
            <div class="auth-text auth-email fw-bold fs-12"></div>
        </div>

        <div class="d-block mb-3">
            <div class="input-group mb-1">
                <span class="input-group-text bg-white ps-3">
                    <i class="ri-lock-line"></i>
                </span>
                <input type="password" class="form-control ps-0 pe-3 pt-3 pb-3 fs-14 shadow-none border-start-0 border-end-0" placeholder="Password" name="password">
                <span class="input-group-text bg-white ps-3" onclick="ShowPassword()">
                    <i class="ri-eye-off-line"></i>
                </span>
            </div>
            <div class="auth-text auth-password fw-bold fs-12"></div>
        </div>

        <div class="form-check mb-3 fs-14 text-start">
            <input class="form-check-input input-sm shadow-none" type="checkbox" name="remember">
            <label class="form-check-label" for="flexCheckDefault">
                Remember Me
            </label>
        </div>

        <div class="d-flex mb-3">
            <button class="btn btn-auth shadow-none w-100 text-white ps-5 pe-5 pt-2 pb-2 fs-14">
                Login
            </button>
        </div>

        <div class="d-flex fs-12 fw-bold">
            <span class="ms-auto">
                Lupa Password?
                <a href="{{config('app.config')}}/forgot-password">
                    Klik Disini
                </a>
            </span>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('form').submit(function(e) {
        e.preventDefault();
        $("button").addClass("disabled");
        $.ajax({
            type: "POST",
            url: "{{config('app.url')}}/{{Request::segment(1)}}",
            data: $(this).serialize(),
            success: function(r) {
                $(".auth-message").addClass("text-start text-success mb-3").removeClass("auth-text").html(r.message);
                setTimeout(function() {
                    location.href = r.redirect_url;
                }, 1000);
            },
            error: function(r) {
                $("button").removeClass("disabled");
                $.each(r.responseJSON.errors, function(k, v) {
                    $(`.auth-${k}`).addClass("text-start text-danger").html(v);
                });
            }
        })
    })
</script>
@endsection