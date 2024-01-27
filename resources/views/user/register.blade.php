<x-base_struct title="Register">
    <div class="d-flex justify-content-center flex-column align-items-center vh-100">
        <div class="card site-secondary p-3 mb-3 msg-display justify-content-between d-none">
            <div class="d-flex align-items-center justify-content-center">
                <i class="far fa-spin fa-spinner close"></i>
                <span class="ms-3">An Error Occurred</span>
            </div>
        </div>
        <div class="shadow card site-secondary p-5">
            <h1 class="mb-4 text-center"><i class="far fa-route-interstate me-3"></i>Register</h1>
            <form action="" class="mb-3" id="register-form">
                <div class="form-group position-relative mb-4">
                    <input class="form-control p-3 position-relative floating" name="name" type="text" id="name" placeholder=" " validate/>
                    <label for="name" class="float-label position-absolute ">Full Name</label>
                </div>
                <p class="msg text-danger"></p>
                <div class="form-group position-relative mb-4">
                    <input class="form-control p-3 position-relative floating" name="email" id="email" type="email" placeholder=" " email validate/>
                    <label for="email" class="float-label position-absolute">Email</label>
                </div>
                <p class="msg text-danger"></p>
                <div class="form-group position-relative mb-4">
                    <input class="form-control p-3 position-relative floating" name="password" type="password" id="password" placeholder=" " validate password/>
                    <label for="password" class="float-label position-absolute">Password</label>
                </div>
                <p class="msg text-danger"></p>
                <div class="form-group position-relative mb-4">
                    <input class="form-control p-3 position-relative floating" name="phone" id="phone" type="" placeholder=" " validate phone/>
                    <label for="phone" class="float-label position-absolute">Phone Number</label>
                </div>
                <p class="msg text-danger"></p>
                <button class="btn btn-primary w-100">Register<i class="fa ms-5 d-none loader fa-spin fa-spinner-third"></i></button>
            </form>
            <div class="d-flex justify-content-center mb-3">
                <div class="hr"></div>
                <span>OR</span>
                <div class="hr"></div>
            </div>
            <div class="d-flex w-100 align-items-center mb-4 justify-content-between">
                <i class="fab fa-google fa-2x"></i>
                <i class="fab fa-twitter fa-2x"></i>
                <i class="fab fa-facebook fa-2x"></i>
            </div>
            <p class="lead text-center">Already have an account? <a href="/login" class="text-decoration-none">Login</a></p>
        </div>
    </div>
    <script defer src="{{asset('js/form-validator.js')}}"></script>
</x-base_struct>
