<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-secondary text-white font-medium px-5 py-3 rounded-md mt-3 cursor-pointer']) }}>
    {{ $slot }}
</button>