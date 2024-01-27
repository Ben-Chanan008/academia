<!-- Modal -->
<div class="overflow-hidden modal fade" id="add-wallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center h-100">
        <div class="modal-content site-secondary">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="far fa-credit-card me-3"></i>Add Card</h1>
                <button type="button" class="btn far fa-times text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/card/register" id="card-form" class="py-5" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" name="card_number" type="text" id="card_number" placeholder=" " validate card_number/>
                                <label for="card_number" class="float-label position-absolute">Card Number</label>
                            </div>
                            <p class="msg text-danger"></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" name="card_name" type="text" id="card_name" placeholder=" " validate/>
                                <label for="card_name" class="float-label position-absolute">Card name</label>
                            </div>
                            <p class="msg text-danger"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" name="cvc" id="cvc" type="text" placeholder=" " cvc validate/>
                                <label for="cvc" class="float-label position-absolute">CVC</label>
                            </div>
                            <p class="msg text-danger"></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-4">
                                <select name="card_type" id="card_type" class="form-control p-3 form-select site-secondary text-white" required>
                                    <option selected>Please Select a card</option>
                                    @foreach($card_type as $card)
                                        <option value="{{$card->id}}">{{$card->card_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('card_type')<p class="msg text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" name="start" type="date" id="start" placeholder=" " validate date/>
                                <label for="start" class="float-label position-absolute">Date of Issue</label>
                            </div>
                            <p class="msg text-danger"></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group position-relative mb-4">
                                <input class="form-control p-3 position-relative floating" name="expiration" type="date" id="expiration" placeholder=" " validate date/>
                                <label for="expiration" class="float-label position-absolute">Expiration</label>
                            </div>
                            <p class="msg text-danger"></p>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100">Add Card<i class="ms-2 fab fa-google-wallet"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
