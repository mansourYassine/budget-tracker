<x-layouts.guest>
    <h2 class=" font-bold text-2xl ">Create Account</h2>
    <form action="{{ route('register.post') }}" method="post" class="mt-5">
        <div class=" flex flex-col mb-4">
            <x-forms.input-label for="form-name" :value="__('FULL NAME')" />
            <input type="text" name="name" id="form-name" placeholder="John Doe" value="{{ old('name') }}" class=" @error('name') is-invalid @enderror border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3">
            @error('name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class=" flex flex-col mb-4">
            <x-forms.input-label for="form-email" :value="__('EMAIL ADDRESS')" />
            <input type="email" name="email" id="form-email" placeholder="name@email.com"  value="{{ old('email') }}" class=" @error('email') is-invalid @enderror border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3 ">
            @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class=" flex flex-col mb-4">
            <x-forms.input-label for="form-pass" :value="__('PASSWORD')" />
            <input type="password" name="password" id="form-pass" placeholder="••••••••" class=" @error('password') is-invalid @enderror border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3 ">
            @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class=" bg-secondary text-white font-medium px-5 py-3 rounded-md w-full mt-3 cursor-pointer">Create Account</button>
    </form>
    @push('scripts')
        @vite('resources/js/pages/register.js')
    @endpush
</x-layouts.guest>
