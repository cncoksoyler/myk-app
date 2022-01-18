<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aday Ekleme') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <form class="form" action="{{route('applicants.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800v mt-8">
                                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Aday Bilgileri</h2>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error )
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                @endif


                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Ad</label>
                                        <input name="name" type="text" value="{{old('name')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Soyad</label>
                                        <input name="surname" type="text" value="{{old('surname')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">TC</label>
                                        <input name="TC" type="text" value="{{old('TC')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Mobil</label>
                                        <input name="mobile" type="text" value="{{old('mobile')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Çalıştığı Yer</label>
                                        <input name="workplace" type="text" value="{{old('workplace')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>

                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200" for="AMG">Uzmanlık</label>
                                        <select name="profession" value="{{old('profession')}}" class="w-full block border border-gray-300 bg-white text-gray-700 rounded px-3 py-2 outline-none mt-2">
                                            @foreach ($profession as $item )
                                            <option class="py-1" value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div>
                                        <label class="text-gray-700 dark:text-gray-200">Alt Uzmanlık</label>
                                        <input name="subspeciality_detail" type="text" value="{{old('subspeciality_detail')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>


                                </div>

                                <div class="flex justify-end mt-6">
                                    <x-button class="ml-3">
                                        {{ __('Kaydet') }}
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



</x-app-layout>