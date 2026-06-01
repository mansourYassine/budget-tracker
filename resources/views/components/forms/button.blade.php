<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-secondary text-white font-medium px-5 py-3 rounded-md cursor-pointer']) }}>
    {{ $slot }}
</button>