<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center text-center rounded px-4 py-3 border border-transparent font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mb-5']) }}>
    {{ $slot }}
</button>
