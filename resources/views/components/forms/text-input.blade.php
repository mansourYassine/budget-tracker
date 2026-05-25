@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3']) }}>