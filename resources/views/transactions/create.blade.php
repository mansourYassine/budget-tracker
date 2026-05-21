@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
<div class=" bg-white shadow-sm/20 mt-6 rounded-md h-fit w-5/6 md:w-1/2 xl:w-1/3 px-4 md:px-12 py-4 md:py-8 ">
    <h2 class=" font-bold text-2xl ">Create New Transaction</h2>
    <form action="/transactions/store" method="post" class="mt-5">
        <div class=" flex flex-col mb-4">
            <label for="title" class=" text-sm font-medium text-gray-600 mb-2.5 ">TITLE</label>
            <input type="text" name="title" id="title" placeholder="Buy Groceries" value="{{ old('title') }}" required class=" @error('title') is-invalid @enderror border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3">
            @error('title')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class=" flex flex-col mb-4">
            <label for="amount"  class=" text-sm font-medium text-gray-600 mb-2.5 ">AMOUNT</label>
            <input type="number" name="amount" id="amount" placeholder="Ex: 156"  value="{{ old('amount') }}" required min="0" class=" @error('amount') is-invalid @enderror border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3 ">
            @error('amount')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class=" flex flex-col mb-4">
            <p for="amount" class=" text-sm font-medium text-gray-600 mb-2.5 ">TYPE</p>
            <div class=" flex gap-2">
                <div class=" flex-1 border border-gray-300 rounded-xl py-3 px-3 bg-red-50 flex justify-center items-center gap-2">
                    <input type="radio" name="type" value="expense" id="expense-radio" checked>
                    <label for="expense-radio" class=" text-lg font-semibold text-red-500">Expense</label>
                </div>
                <div class=" flex-1 border border-gray-300 rounded-xl py-3 px-3 bg-green-50 flex justify-center items-center gap-2">
                    <input type="radio" name="type" value="income" id="income-radio">
                    <label for="income-radio" class=" text-lg font-semibold text-emerald-600">Income</label>
                </div>
            </div>
        </div>
        <div class=" flex flex-col mb-4">
            <label for="date" class=" text-sm font-medium text-gray-600 mb-2.5 ">DATE</label>
            <input type="datetime-local" name="date" id="date" value="{{ old('date') }}" class="border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3">
        </div>
        <div class=" flex flex-col mb-4">
            <label for="notes" class=" text-sm font-medium text-gray-600 mb-2.5 ">NOTES</label>
            <textarea name="notes" id="notes" rows="3" placeholder="Describe this transaction..." value="{{ old('notes') }}" class="border border-gray-300 bg-backgr rounded-md focus:border-blue-500 focus:outline-none pl-3 pt-1.5"></textarea>
        </div>
        <div class="flex gap-4">
            <button type="submit" class=" bg-secondary text-white font-semibold px-5 py-3 rounded-md w-full mt-3 cursor-pointer">Save</button>
            <a href="/transactions" class=" text-center bg-gray-50 border border-gray-300 text-gray-600 font-semibold px-5 py-3 rounded-md w-full mt-3 cursor-pointer">Cancel</a>
        </div>
    </form>
</div>
@endsection