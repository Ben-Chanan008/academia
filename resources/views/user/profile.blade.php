<x-base_struct title="Profile">
    <x-sidebar />
    <x-navbar />
    <x-align-items>
        <div class="row w-100 h-100">
            <div class="col-lg-4 h-100">
                <div class="card w-100 h-50 site-secondary justify-content-center align-items-center flex-column rounded-4">
                    <img src="{{asset('images/user-3d.webp')}}" alt=""  class="img-fluid h-75 rounded-circle border-1" />
                    <span class="h3 mt-3 fw-bold">{{strtoupper(auth()->user()->name)}}</span>
                    <span class="lead">{{auth()->user()->email}}</span>
                </div>
            </div>
            <div class="col">
                <h1><i class="me-3 far fa-pen"></i>Update Info</h1>
                <hr class="">
                <form action="/profile/update" class="mt-5 mb-3" id="register-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" value="{{auth()->user()->name}}" name="name" type="text" id="name" placeholder=" "/>
                                <label for="name" class="float-label position-absolute">Full Name</label>
                            </div>
                            @error('name')
                                <p class="msg text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" value="{{auth()->user()->email}}" name="email" id="email" type="email" placeholder=" "/>
                                <label for="email" class="float-label position-absolute">Email</label>
                            </div>
                            @error('email')
                                <p class="msg text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" value="**************" name="password" type="password" id="password" placeholder=" " />
                                <label for="password" class="float-label position-absolute">Password</label>
                            </div>
                            @error('password')
                                <p class="msg text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" value="{{auth()->user()->phone}}" name="phone" id="phone" placeholder=" " />
                                <label for="phone" class="float-label position-absolute">Phone Number</label>
                            </div>
                            @error('phone')
                                <p class="msg text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex w-100 justify-content-end">
                        <button class="btn btn-primary">Update<i class="fa ms-5 d-none loader fa-spin fa-spinner-third"></i></button>
                    </div>
                </form>
                <h1><i class="me-3 far fa-gear" id="settings"></i>Settings</h1>
                <hr class="">
                <div class="flex-column d-flex">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <i class="far fa-moon me-3"></i>
                            <span class="lead">Dark Mode</span>
                        </div>
                        <div>
                            <input type="checkbox" id="check-dark" class="form-control-check user-check">
                            <label for="check-dark" class="box-content"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="far fa-pen me-3"></i>
                            <span class="lead">Edit Information</span>
                        </div>
                        <div>
                            <input type="checkbox" id="check-edit" class="form-control-check user-check">
                            <label for="check-edit" class="box-content"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-align-items>
</x-base_struct>
