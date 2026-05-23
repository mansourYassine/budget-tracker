@extends('layouts.app')

@section('title', 'Transactions')

<script>
    let transactions = @json($transactions);
</script>

@push('scripts')
    @vite('resources/js/pages/transactions.index.js')
@endpush

@section('content')
    <div class=" flex flex-col px-5 pt-5">
        <div class="bg-white shadow-md/5 rounded-2xl w-full flex flex-col md:flex-row items-center justify-center gap-4 md:gap-5 lg:gap-18 py-10">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute top-[50%] translate-y-[-50%] left-2 text-gray-500"></i>
                <input type="search" id="search-transactions" placeholder="Search transactions..." class=" text-lg border border-gray-400 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-9 py-5.5 md:w-70 lg:w-85">
            </div>
            <div class="flex items-center gap-3">
                <label class="text-lg">Type:</label>
                <select name="type" id="transactions-type" class=" border border-gray-400 bg-backgr rounded-md h-11.5 pl-2 focus:outline-none w-30">
                    <option value="all" selected>All</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="flex items-center gap-3">
                <label class="text-lg">Due:</label>
                <select name="type" id="transactions-date" class=" border border-gray-400 bg-backgr rounded-md h-11.5 pl-2 focus:outline-none w-30">
                    <option value="today">Today</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                </select>
            </div>
        </div>
        <table class=" rounded-2xl overflow-hidden my-7">
            <thead class=" bg-blue-200 text-gray-500">
                <tr class=" flex">
                    <th class=" flex-2 text-lg">Due Date</th>
                    <th class=" flex-3 text-lg">Title</th>
                    <th class=" flex-2 text-lg">Income</th>
                    <th class=" flex-2 text-lg">Expense</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
@endsection