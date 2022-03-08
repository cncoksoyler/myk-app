<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kullanıcı Listesi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <form class="form" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800v mt-8">
                                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Aday Bilgileri</h2>


                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Seçim</label>
                                        <input name="selection" type="checkbox" maxlength="11" value="{{old('selection')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Ad</label>
                                        <input name="name" type="text" value="{{old('name')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Email</label>
                                        <input name="email" type="email" value="{{old('email')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Yetki</label>
                                        <input name="type" type="text" maxlength="11" value="{{old('type')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Oluşturma</label>
                                        <input name="created_at" type="text" maxlength="11" value="{{old('created_at')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Güncelleme</label>
                                        <input name="updated_at" type="text" maxlength="11" value="{{old('updated_at')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <x-button class="ml-3">
                                        Sil
                                    </x-button>
                                </div>

                            </section>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->



</x-admin-layout>