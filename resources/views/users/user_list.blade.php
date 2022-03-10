<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kullanıcı Listesi') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-auto justify-items-center ml-10">
        <!-- Session Message -->
        <x-message-status class="mb-4" :message="session('message')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>

    <form action="{{route('users.destroy','selection')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <div class="flex flex-col m-6">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div>

                        <x-button class="block mb-4">
                            {{ __('Kullanıcıyı Sil') }}
                        </x-button>

                    </div>
                    <div class="flex items-center justify-end ">
                        @livewire('search-users')
                    </div>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="table-auto min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Seçim
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kullanıcı adı
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Yetki
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Oluşturma
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Güncelleme
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ( $users as $item )
                                <tr>
                                    <td>
                                        <div class="flex w-8 px-6 py-4 whitespace-nowrap">

                                            <input name="selection[]" type="checkbox" value="{{$item->id}}" class="block px-2 py-2  ml-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        </div>
                                    </td>

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
                                        <div class="text-sm text-gray-900">{{$item->name}}</div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$item->email}}</div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$item->type}}</div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$item->created_at}}</div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$item->updated_at}}</div>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- More people... -->
                                {{ $users->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-admin-layout>