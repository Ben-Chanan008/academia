@php use Carbon\Carbon; @endphp
<x-align-items>

    <div class="row h-100 w-100">
        <div class="col-lg-8 h-100 d-lg-block d-none">
            <div class="card statistics site-secondary w-100 border-0 rounded-0 p-4 rounded-4">
                <div class="d-flex px-4 justify-content-center">
                    <div class="d-flex align-items-center mx-5 ">
                        <div>
                            <p class="mb-1 text-light">Total Income</p>
                            <span class="h3">$2100</span>
                        </div>
                        <div class="position-relative image-side d-flex flex-column justify-content-center">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="ms-4 progress-circular">
                                    <span class="progress-value">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex px-4 align-items-center">
                        <div>
                            <p class="mb-1">Total Income</p>
                            <span class="h3">$2100</span>
                        </div>
                        <div class="position-relative image-side d-flex flex-column justify-content-center">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="ms-4 progress-circular">
                                    <span class="progress-value">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex px-4 align-items-center">
                        <div>
                            <p class="mb-1">Total Income</p>
                            <span class="h3">$2100</span>
                        </div>
                        <div class="position-relative image-side d-flex flex-column justify-content-center">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="ms-4 progress-circular">
                                    <span class="progress-value">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 card site-secondary mt-4 rounded-4 border-0 h-50">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled d-flex">
                        <li class="mx-4">Income</li>
                        <li class="mx-4">Expense</li>
                    </ul>
                    <div>
                        <button class="btn btn-secondary text-white">Last Week <i class="ms-2 far fa-chevron-down"></i></button>
                    </div>
                </div>
            </div>
            <div class="d-flex w-100 mt-4">
                <div class="w-50">
                    <div class="card rounded-4 p-4 site-secondary"></div>
                </div>
                <div class="w-50 ms-4">
                    <div class="card p-4 site-secondary rounded-4">
                        <div class="d-flex justify-content-between">
                            <span class="">Investment</span>
                            <i class="far fa-chart-area"></i>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <span class="h1">$20000</span>
                            <span>+5%</span>
                        </div>
                        <div class="w-100 progress-bar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mx-lg-5 mx-3">
            <div class="d-flex justify-content-around">
                <span class="">My Cards</span>
                <i class="far fa-list-dots"></i>
            </div>
            <div class="card d-flex flex-column text-white site-secondary p-5 mt-4">
                <span class="lead">Owner</span>
                <p class="h1">{{auth()->user()->name}}</p>
            </div>
            <div class="d-flex justify-content-lg-around mt-3 justify-content-between">
                <span class="">Recent Transactions</span>
                <i class="far fa-list-dots"></i>
            </div>
            <div class="mt-4">
                <p class="">Today</p>
                @forelse($expenses as $expense)
                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="rectangle d-flex justify-content-center align-items-center">
                                <i class="far fa-business-time"></i>
                            </div>
                            <div class="d-flex ms-2 flex-column">
                                <span>{{$expense->transaction}}</span>
                                <span>@php print_r(Carbon::parse($expense->created_at)->format('H:i') . 'AM')@endphp</span>
                            </div>
                        </div>
                        <span>${{$expense->amount}}</span>
                    </div>
                    @empty
                        <p class="text-white">No Transactions Made</p>
                @endforelse
{{--                <div class="d-flex justify-content-between  mb-3 align-items-center">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="rectangle"></div>--}}
{{--                        <div class="d-flex ms-2 flex-column">--}}
{{--                            <span>Dribble</span>--}}
{{--                            <span>11:55AM</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span>$12.34</span>--}}
{{--                </div>--}}
{{--                <div class="d-flex justify-content-between  mb-3 align-items-center">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="rectangle"></div>--}}
{{--                        <div class="d-flex ms-2 flex-column">--}}
{{--                            <span>Dribble</span>--}}
{{--                            <span>11:55AM</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span>$12.34</span>--}}
{{--                </div>--}}
{{--                <p class="">Yesterday</p>--}}
{{--                <div class="d-flex justify-content-between mb-3 align-items-center">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="rectangle"></div>--}}
{{--                        <div class="d-flex ms-2 flex-column">--}}
{{--                            <span>Dribble</span>--}}
{{--                            <span>11:55AM</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span>$12.34</span>--}}
{{--                </div>--}}
{{--                <div class="d-flex justify-content-between  mb-3 align-items-center">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="rectangle"></div>--}}
{{--                        <div class="d-flex ms-2 flex-column">--}}
{{--                            <span>Dribble</span>--}}
{{--                            <span>11:55AM</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <span>$12.34</span>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</x-align-items>
