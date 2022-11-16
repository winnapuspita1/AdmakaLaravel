<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Jenis Surat
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($templates as $template)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $template['name'] }}
                    </th>
                    <td class="py-4 px-6 text-center">
                        <a href="{{ url($template['file']) }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Download
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
