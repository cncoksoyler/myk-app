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
                            <a href="{{route('results.create')}}">
                                <x-button>
                                    {{ __('Add Applicant') }}
                                </x-button>
                            </a>
                        </div>
                        <div x-data="{}">

                            <button type="button" @click="('search-modal', 'show')" class="inline-flex content-end px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </span>Click to Open Modal
                            </button>

                        </div>
                        <!-- <div x-data="{ open: false }">
                            <button @click="open = true">Show More...</button>

                            <ul x-show="open" @click.away="open = false">
                                <li><button wire:click="archive">Archive</button></li>
                                <li><button wire:click="delete">Delete</button></li>
                            </ul>
                        </div> -->

                    </div>
                    <div class="flex-none w-100"></div>
                    <div class="flex-auto flex-end">
                        <div class="container flex mx-auto">
                            <div class="flex border-2 rounded">
                                <button class="flex items-center justify-center px-4 border-r">
                                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
                                        </path>
                                    </svg>
                                </button>
                                <input type="text" class="px-4 py-2 w-80" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if ($data[0] === null)
                    <h1>{{$dummy->name}} - {{$dummy->period}} </h1>
                    @else
                    @dd($data)
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

    <livewire:search-modal />



</x-app-layout>