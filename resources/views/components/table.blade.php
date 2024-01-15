<table class="items-center w-full bg-transparent border-collapse h-full">
    <thead class="sticky top-0">
        <tr class="">
            @foreach ($columns as $column)
                <th
                    class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500">
                    {{ $column }}
                </th>
            @endforeach
            <th
                class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500">
            </th>
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
