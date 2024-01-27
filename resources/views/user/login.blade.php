<x-base_struct title="Login">
    <div class="d-flex justify-content-center flex-column align-items-center vh-100">
        <div class="card site-secondary p-3 mb-3 msg-display justify-content-between d-none">
            <div class="d-flex align-items-center justify-content-center">
                <i class="far fa-spin fa-spinner close"></i>
                <span class="ms-3">An Error Occurred</span>
            </div>
        </div>
        <div class="shadow card site-secondary p-5">
            <h1 class="mb-4 text-center"><i class="far me-3 fa-shield-plus"></i>Sign In</h1>
            <form class="mb-3" id="login-form" enctype="multipart/form-data" method="POST">
                <div class="form-group position-relative mb-4">
                    <input class="form-control p-3 position-relative floating" id="email" type="email" placeholder=" " name="email" validate email/>
                    <label for="email" class="float-label position-absolute">Email</label>
                </div>
                <p class="text-danger msg"></p>
                <div class="form-group position-relative mb-3">
                    <input class="form-control p-3 position-relative floating" type="password" id="password" name="password" placeholder=" " validate password/>
                    <label for="password" class="float-label position-absolute">Password</label>
                </div>
                <p class="text-danger msg"></p>
                <button class="btn btn-primary w-100">Sign In<i class="fa ms-5 d-none loader fa-spin fa-spinner-third"></i></button>
            </form>
            <div class="d-flex justify-content-center mb-3">
                <div class="hr"></div>
                <span>OR</span>
                <div class="hr"></div>
            </div>
            <div class="d-flex w-100 align-items-center mb-4 justify-content-between">
                <a href="/auth/google/redirect" class="text-white"><i class="fab fa-google fa-2x"></i></a>
                <a href="" class="text-white"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="/auth/facebook/redirect" class="text-white"><i class="fab fa-facebook fa-2x"></i></a>
            </div>
            <p class="lead text-center">Don't have an account? <a href="/register" class="text-decoration-none">Register</a></p>
        </div>
    </div>
    <script defer src="{{asset('js/form-validator.js')}}"></script>
</x-base_struct>
