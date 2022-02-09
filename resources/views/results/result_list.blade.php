<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant Detail') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="flex flex-col m-6">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                <div class="flex">
                    <div class="flex-auto">
                        <div class="flex pt-6 px-6">
                            <a href="{{route('results.create',['id' => Route::current()->parameter('id')])}}">
                                <x-button>
                                    {{ __('Add Applicant') }}
                                </x-button>
                            </a>
                        </div>

                    </div>
                    <div class="flex items-center justify-end ">
                        @livewire('contact-search-bar',['id' => Route::current()->result])

                    </div>

                </div>

                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if ($data[0] === null)
                    <h1>{{$dummy->name}} - {{$dummy->period}} </h1>
                    @else

                    <h1>{{$data[0]->examDetails->name}} - {{$data[0]->examDetails->period}} </h1>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applicant ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applicant Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applicant Surname
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    TC
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Mobile
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Score
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Updated At
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ( $data as $item )
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$item->id}}
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$item->applicantDetails->name}}</div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$item->applicantDetails->surname}}</div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$item->applicantDetails->TC}}</div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$item->applicantDetails->mobile}}</div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><input type="text" class="from-control" value="{{$item->result}}"></div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$item->created_at}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$item->updated_at}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit </a>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Drop</a>
                                </td>
                            </tr>
                            @endforeach


                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>