@props(['th' => [], 'id' => ''])
@php
$theadTh = 'whitespace-nowrap font-medium text-sm border-b dark:border-black/30 border-gray-300 text-center';
@endphp
<table class="w-full dynamicTable border border-gray-300 dark:border-black/30" id="{{ $id }}">
    <thead class="bg-black/30">
        <tr>
            <th class="{{ $theadTh }}">
                #
            </th>
            @foreach ($th as $header)
            <th class="{{ $theadTh }}">
                {{ $header }}
            </th>
            @endforeach
            <th class="{{ $theadTh }}" width="0.5%">
                <button
                    class="addRow bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 rounded-md p-2 text-center font-semibold text-white shadow-sm transition-colors duration-200 flex items-center justify-center h-8 w-8 m-0.5">
                    <x-sgd.form.icon role="add" class="!text-base" />
                </button>
            </th>
        </tr>
    </thead>
    <tbody class="appendClone">
        <tr class="cloneRow text-sm border-b dark:border-black/30 border-gray-300">
            <td class="text-center counter">1</td>
            {{ $slot }}
            <td>
                <button
                    class="deleteRow bg-red-600 dark:bg-red-500 hover:bg-red-500 dark:hover:bg-red-400 rounded-md p-2 text-center font-semibold text-white shadow-sm transition-colors duration-200 flex items-center justify-center h-8 w-8 m-0.5">
                    <svg class="sgd-accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </td>
        </tr>
    </tbody>
</table>