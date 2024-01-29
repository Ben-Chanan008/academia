@php use App\Models\CardType;use App\Models\Wallet;use Illuminate\Support\Facades\Crypt; @endphp
<x-base_struct title="Transactions">
    <x-align-items class="overflow-x-hidden">
        <div class="mx-3 d-flex" id="transaction">
            <div class="w-100 step active">
                <h1>Choose a Card</h1>
                <span>You're just a few steps away from making a transaction</span>
                <div class="d-flex flex-shrink-0 w-100 flex-column cards mt-4 overflow-x-hidden">
                    @forelse($cards as $card)
                        <div class="mb-3">
                            <input type="radio" id="{{$card->id}}" class="form-control-check" value="{{Crypt::encryptString($card->cvc)}}"/>
                            <label for="{{$card->id}}" class="w-100">
                                <div class="d-flex site-secondary rounded-3 p-3 align-items-center">
                                    <div class="me-3"><i class="far fa-credit-card"></i></div>
                                    <div>
                                        <span>@php $card_type = print_r(CardType::getCardType($card->card_type))@endphp</span>
                                        <p class="fw-bold">@php print_r(Wallet::getCardNumber(Crypt::decryptString($card->card_number)))@endphp</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    @empty
                        <span>No cards Owned Yet. <a href="/wallet">Add Card</a></span>
                    @endforelse
                </div>
            </div>
            <div class="w-100 step">
                <div class="d-flex flex-column flex-shrink-0">
                    <div class="mb-3">
                        <form class="m-3 site-secondary rounded-3 p-4" method="POST" id="income-form">
                            <span class="mb-3"><i class="far me-3 fa-pen"></i>Add Income</span>
                            <div class="form-group position-relative mt-4">
                                <input class="form-control p-3 floating position-relative" name="income" type="text" id="income" placeholder=" " validate card_number/>
                                <label for="income" class="float-label position-absolute">Income</label>
                            </div>
                            @error('income')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn site-blue mt-4">ADD INCOME</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="w-75 btn btn-primary" data-next>Next</button>
        </div>
    </x-align-items>
    <x-navbar/>
    <x-sidebar/>
    <script src="{{asset('js/transaction.js')}}" defer></script>
</x-base_struct>
