<table class="items-center w-full bg-transparent border-collapse h-full">
    <thead class="sticky top-0">
        <tr class="bg-indigo-100 text-indigo-600">
            @foreach ($columns as $column)
                <th
                    class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    {{ $column }}
                </th>
            @endforeach
            <th
                class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
            </th>
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
