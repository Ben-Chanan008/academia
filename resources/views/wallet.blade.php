<x-base_struct title="My Wallet">
    <x-navbar />
    <x-sidebar />
    <x-align-items>
        @php print_r($modal);@endphp
        <div class="d-flex flex-column justify-content-center h-100 align-items-center">
            <div class="d-flex align-items-center">
                <div class="card site-secondary credit-card p-4 rounded-4 shadow position-relative">
                    <div class="position-absolute">
                        <div class="d-flex justify-content-between">
                            <i class="far fa-credit-card-front"></i>
                            <i class="fab fa-cc-apple-pay"></i>
                        </div>
                        <div class="">
                            <span class="card-number fs-1 fw-bold">{{$hash_number}} </span>
                            <div class="d-flex justify-content-around w-75 mt-3 mb-3">
                                <div class="d-flex">
                                    <span class="w-50">VALID FROM</span>
                                    <p class="lead h5">{{date('m/y', strtotime($card->start))}}</p>
                                </div>
                                <div class="d-flex">
                                    <span class="w-50">VALID THRU</span>
                                    <p class="lead h5">{{date('m/y', strtotime($card->expiration))}}</p>
                                </div>
                            </div>
                        </div>
                        <span class="fs-3 fw-bold">{{$card->card_name}}</span>
                    </div>
                </div>
                <div class="ms-3 add-card d-flex align-items-center justify-content-center site-secondary rounded-circle"><button data-bs-toggle="modal" data-bs-target="#add-wallet" class="border-0 site-secondary"><i class="far fa-plus text-white"></i></button></div>
            </div>
        </div>
        <div class="fixed-bottom d-flex justify-content-end">
            <button class="btn text-white site-blue p-3 m-3">
                <i class="far fa-plus"></i> ADD BUDGET PLAN
            </button>
        </div>
        <div class="fixed-bottom d-flex justify-content-start start-0 position-absolute">
            <button class="btn text-white site-blue p-3 m-3">
                <i class="far fa-plus"></i> ADD INCOME
            </button>
        </div>
    </x-align-items>
    <script defer src="{{asset('js/form-validator.js')}}"></script>
</x-base_struct>
