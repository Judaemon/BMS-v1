<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs flex flex-col">
        <div class="flex flex-col space-y-2 xl:space-x-2 xl:space-y-0 xl:flex-row">
            <div class="p-2 bg-gray-800 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">Registered Population</h1>
            </div>
            <div class="p-2 bg-gray-800 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">List of Request</h1>
            </div>
            <div class="p-2 bg-gray-800 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">Registered Voter</h1>
            </div>
            <div class="p-2 bg-gray-800 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">Male</h1>
            </div>
            <div class="p-2 bg-gray-800 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">Female</h1>
            </div>
        </div>

        <div class="flex flex-row">
            <div class="p-2 basis-8/12">
                <h2 class="my-6 text-1xl font-semibold text-gray-700 text-center">
                    Current Barangay Member
                </h2>
                <div class="max-w-2xl mx-auto">
                    <div class="flex flex-col">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Position
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Length of employment
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Names</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Position</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Year</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="p-2 basis-4/12">
                <h2 class="my-6 text-1xl font-semibold text-gray-700 text-center">
                    Puroks/Areas
                </h2>
                <div class="max-w-2xl mx-auto">
                    <div class="flex flex-col">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Puroks/Areas
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Population
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">Position</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Year</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
