@php
    use Carbon\Carbon;
//	dd($total)
 @endphp
<x-base_struct title="Statement">
    <x-align-items class="h-100">
        <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Transaction</th>
                    <th scope="col">$$$</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($expenses as $idx => $expense)
                    <tr>
                        <th scope="row">{{$idx + 1}}</th>
                        <td>{{$expense->transaction}}</td>
                        <td>{{$expense->amount}}</td>
                        <td>@php echo Carbon::parse($expense->created_at)->format('H:i')  @endphp <span>@php echo Carbon::parse($expense->created_at)->format('H') >= 12 ? 'PM' : 'AM' @endphp</span></td>
                    </tr>
                    @empty
                        <p>No transactions</p>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" scope="row">Total</th>
                    <td colspan="">${{number_format($expenses->sum(fn ($expense) => floatval($expense['amount'])), 2)}}</td>
                </tr>
            </tfoot>
        </table>
    </x-align-items>
    <x-navbar />
    <x-sidebar />
</x-base_struct>
