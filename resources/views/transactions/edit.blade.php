<x-layouts.app>
    <x-slot:title>Edit Transaction</x-slot:title>
    <div class=" flex justify-center">
        <div class=" bg-white shadow-sm/20 mt-6 rounded-md h-fit w-5/6 md:w-1/2 xl:w-1/3 px-4 md:px-12 py-4 md:py-8 ">
            <h2 class=" font-bold text-2xl text-center sm:text-left ">Edit Transaction</h2>
            <form id="edit-form" action="{{ route('transactions.update', ['id' => $transaction->id]) }}" method="post" class="mt-5" novalidate>
                @csrf
                @method('PUT')
                {{-- Title --}}
                <div class=" flex flex-col mb-4">
                    <x-forms.input-label for="title" :value="__('TITLE')" />
                    <x-forms.text-input type="text" name="title" id="title" placeholder="Buy Groceries" :value="old('title') ?? $transaction->title" required />
                    <x-forms.input-error :messages="$errors->get('title')" />
                </div>
                {{-- Amount --}}
                <div class=" flex flex-col mb-4">
                    <x-forms.input-label for="amount" :value="__('AMOUNT')" />
                    <x-forms.text-input type="number" name="amount" id="amount" placeholder="Ex: 156" :value="old('amount') ?? $transaction->amount" min="0" step="0.01" required />
                    <x-forms.input-error :messages="$errors->get('amount')" />
                </div>
                {{-- Type --}}
                <div class=" flex flex-col mb-4">
                    <p for="amount" class=" text-sm font-medium text-gray-600 mb-2.5 ">TYPE</p>
                    <div class=" flex gap-2">
                        @if ($transaction->type->value === 'expense')
                            <div class=" flex-1 border border-gray-300 rounded-xl py-3 px-3 bg-red-50 flex justify-center items-center gap-2">
                                <input type="radio" name="type" class="@error('type') is-invalid @enderror " value="expense" id="expense-radio" checked>
                                <label for="expense-radio" class=" text-lg font-semibold text-red-500">Expense</label>
                            </div>
                            <div class=" flex-1 border border-gray-300 rounded-xl py-3 px-3 bg-green-50 flex justify-center items-center gap-2">
                                <input type="radio" name="type" class="@error('type') is-invalid @enderror " value="income" id="income-radio">
                                <label for="income-radio" class=" text-lg font-semibold text-emerald-600">Income</label>
                            </div>
                        @elseif ($transaction->type->value === 'income')
                            <div class=" flex-1 border border-gray-300 rounded-xl py-3 px-3 bg-red-50 flex justify-center items-center gap-2">
                                <input type="radio" name="type" class="@error('type') is-invalid @enderror " value="expense" id="expense-radio">
                                <label for="expense-radio" class=" text-lg font-semibold text-red-500">Expense</label>
                            </div>
                            <div class=" flex-1 border border-gray-300 rounded-xl py-3 px-3 bg-green-50 flex justify-center items-center gap-2">
                                <input type="radio" name="type" class="@error('type') is-invalid @enderror " value="income" id="income-radio" checked>
                                <label for="income-radio" class=" text-lg font-semibold text-emerald-600">Income</label>
                            </div>
                        @endif
                    </div>
                    @error('type')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Date --}}
                <div class=" flex flex-col mb-4">
                    <x-forms.input-label for="date" :value="__('DATE')" />
                    <x-forms.text-input type="datetime-local" name="date" id="date"  :value="old('date') ?? $transaction->date" />
                </div>
                {{-- Notes --}}
                <div class=" flex flex-col mb-4">
                    <label for="notes" class=" text-sm font-medium text-gray-600 mb-2.5 ">NOTES</label>
                    <textarea name="notes" id="notes" rows="3" placeholder="Describe this transaction..." class="border border-gray-300 bg-backgr rounded-md focus:border-blue-500 focus:outline-none pl-3 pt-1.5">{{ old('notes') ?? $transaction->notes }}</textarea>
                </div>
            </form>
            <form id="delete-form" action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
            {{-- Save Changes and Delete --}}
            <div class="flex gap-4 pt-2">
                <x-forms.button form="edit-form" class="w-full">Save</x-forms.button>
                <button form="delete-form" type="submit" class="text-center bg-gray-50 hover:bg-red-500/95 border border-red-300 text-red-600 hover:text-white duration-150 font-semibold px-5 py-3 rounded-md w-full cursor-pointer">Delete</button>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            let deleteForm = document.getElementById('delete-form');
            deleteForm.addEventListener('submit', (e) => {
                e.preventDefault();
                let isConfirm = confirm('Are you sure you want to delete this transaction?');
                if (isConfirm) {
                    deleteForm.submit();
                }
            })
        </script>
    @endpush
</x-layouts.app>