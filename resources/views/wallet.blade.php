@php use App\Models\Wallet;use Illuminate\Support\Facades\Crypt; @endphp
<x-base_struct title="My Wallet">
    <x-align-items>
        @php print_r($modal);@endphp
        <div class="d-flex flex-column justify-content-md-center h-100 align-items-center">
            <div class="d-flex align-items-center flex-md-row flex-column">
                <div class="owl-carousel w-500 owl-theme">
                    @forelse($card as $key => $cd)
                        <div class="card item site-secondary w-500 credit-card p-md-4 p-3 rounded-4 shadow position-relative">
                            <div class="position-absolute">
                                <div class="d-flex justify-content-md-between justify-content-around">
                                    @if($cd->card_type === 1)
                                        <i class="far fa-credit-card-front"></i>
                                    @else
                                        <i class="far fa-credit-card-alt"></i>
                                    @endif
                                    <i class="fab fa-cc-apple-pay"></i>
                                </div>
                                <div class="">
                                    <span class="card-number fs-1 fw-bold">@php print_r(Wallet::getCardNumber(Crypt::decryptString($cd->card_number)))@endphp</span>
                                    <div class="d-flex justify-content-around w-75 mt-3 mb-3">
                                        <div class="d-flex">
                                            <span class="w-50">VALID FROM</span>
                                            <p class="lead h5">{{date('m/y', strtotime($cd->start))}}</p>
                                        </div>
                                        <div class="d-flex">
                                            <span class="w-50">VALID THRU</span>
                                            <p class="lead h5">{{date('m/y', strtotime($cd->expiration))}}</p>
                                        </div>
                                    </div>
                                </div>
                                <span class="fs-3 fw-bold">{{$cd->card_name}}</span>
                            </div>
                        </div>
                    @empty
                        <div>
                            <span>No Cards Added Yet</span>
                        </div>
                    @endforelse
                </div>
                <div class="ms-3 add-card d-flex align-items-center justify-content-center site-secondary rounded-circle">
                    <button data-bs-toggle="modal" data-bs-target="#add-wallet" class="border-0 site-secondary"><i class="far fa-plus text-white"></i></button>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn text-white site-blue p-3 m-3">
                    <i class="far fa-plus"></i> ADD BUDGET PLAN
                </button>
                <button class="btn text-white site-blue p-3 m-3">
                    <i class="far fa-plus"></i> ADD INCOME
                </button>
            </div>
        </div>
        <div class="d-flex justify-content-start">
        </div>
    </x-align-items>
    <x-navbar/>
    <x-sidebar/>
    <script defer src="{{asset('js/form-validator.js')}}"></script>
</x-base_struct>
