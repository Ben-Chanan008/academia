<x-base_struct title="Expenses">
    <x-align-items class="">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div>
                <i class="far fa-business-time"></i>
                <span class="h3">Transactions</span>
                <hr>
            </div>
            <div class="flex-start mt-3 py-3">
                <p class="lead mb-0">My Balance</p>
                <span class="fs-3 fw-bold">$200.000.000</span>
            </div>
            <div class="mt-4">
                <span><i class="far fa-octagon-plus me-2"></i>Create Transaction</span>
                <hr>
                <form action="/expense" id="expense" method="POST" class="p-4 rounded-3 site-secondary">
                    @csrf
                    <div class="form-group position-relative mb-4">
                        <input class="form-control p-3 floating position-relative" name="transaction_name" type="text" id="transaction_name" placeholder=" "/>
                        <label for="income" class="float-label position-absolute">Transaction</label>
                    </div>
                    @error('transaction_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group mb-4 position-relative">
                        <input class="form-control p-3 floating position-relative" name="amount" type="text" id="amount" placeholder=" "/>
                        <label for="income" class="float-label position-absolute">$$$</label>
                    </div>
                    @error('amount')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="d-flex justify-content-end">
                        <button class="btn site-blue px-4">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </x-align-items>
    <x-navbar/>
    <x-sidebar/>
</x-base_struct>
