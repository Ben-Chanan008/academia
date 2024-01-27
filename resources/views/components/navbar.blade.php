<div class="position-absolute top-0 small-search w-100 p-3 shadow align-items-center">
    <button class="btn text-white"><i class="far fa-magnifying-glass"></i></button>
    <input type="text" class="form-control w-100 p-3" placeholder="Search...."/>
    <button class="btn text-white" id="search-cancel"><i class="far fa-times"></i></button>
</div>
<nav class="a-navbar fixed-top site-primary">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="logo g-4">
                <a href="/" class="navbar-brand m-md-3">
    {{--                <img src="{{asset('meta/academia-logo.png')}}" alt=""  class="img-fluid" width="100px" height="100px"/>--}}
                    Academia
                </a>
            </div>
            <div class="search rounded-4 px-2 w-50 d-flex">
                <div class="d-flex p-2 align-items-center w-100">
                    <i class="far fa-magnifying-glass"></i>
                    <input type="text" class="form-control w-100 text-white" placeholder="Search...."/>
                </div>
            </div>
            <div class="small">
                <button class="btn text-white"><i class="far fa-magnifying-glass"></i></button>
            </div>
            <div class="position-relative user d-flex align-items-center rounded-circle ms-3 user-img dropdown-container ms-lg-0">
                <img src="{{asset('images/user-img.png')}}" alt="user-img" class="img-fluid rounded-circle p-1" />
                <i class="far fa-chevron-down ms-2"></i>
                <div class="position-absolute shadow z-1 card bg-dark text-white top-100 start-0 user-links ">
                    <ul class="px-4 py-3 list-group">
                        <a class="text-white text-decoration-none" href="/user/profile">
                            <li class=" list-unstyled">Profile</li>
                        </a>
                        <hr class=""/>
                        <a class="text-white text-decoration-none" href="/user/profile">
                            <li class=" list-unstyled">Settings</li>
                        </a>
                        <hr class=""/>
                        <a class="text-white text-decoration-none" href="/logout">
                            <li class=" list-unstyled">Logout</li>
                        </a>

                    </ul>
                </div>
            </div>
            <div class="icons d-none d-lg-inline">
                <i class="far fa-bell ms-3"></i>
                <i class="far fa-envelope ms-3"></i>
            </div>
    </div>
{{--        <div class="user d-flex align-items-center rounded-circle">--}}
{{--            <img src="{{asset('images/user-img.png')}}" alt="user-img" class="img-fluid rounded-circle p-1" />--}}
{{--            <i class="far fa-chevron-down ms-2"></i>--}}
{{--        </div>--}}
    </div>
</nav>
