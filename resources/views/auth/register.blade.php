<x-layouts.guest>
    <h2 class=" font-bold text-2xl ">Create Account</h2>
    <form action="{{ route('register.post') }}" method="post" class="mt-5">
        <div class=" flex flex-col mb-4">
            <x-forms.input-label for="form-name" :value="__('FULL NAME')" />
            <x-forms.text-input type="text" name="name" id="form-name" placeholder="John Doe" :value="old('name')" required />
            <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class=" flex flex-col mb-4">
            <x-forms.input-label for="form-email" :value="__('EMAIL ADDRESS')" />
            <x-forms.text-input type="email" name="email" id="form-email" placeholder="name@email.com" :value="old('email')" required />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class=" flex flex-col mb-4">
            <x-forms.input-label for="form-pass" :value="__('PASSWORD')" />
            <x-forms.text-input type="password" name="password" id="form-pass" placeholder="••••••••" :value="old('password')" required />
            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <x-forms.button class="w-full">Create Account</x-forms.button>
    </form>
    @push('scripts')
        @vite('resources/js/pages/register.js')
    @endpush
</x-layouts.guest>
