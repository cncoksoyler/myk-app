<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sınav Ekleme') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <form class="form" action="{{route('exams.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800v mt-8">
                                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white  px-5">Sınav Bilgileri</h2>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error )
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                @endif


                                <div class="flex flex-auto justify-items-start">
                                    <div class="flex flex-col px-5">
                                        <label class="text-gray-700 dark:text-gray-200">Sınav Adı</label>
                                        <input name="name" type="text" value="{{old('name')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div class="flex flex-col px-5">
                                        <label class="text-gray-700 dark:text-gray-200">Dönem</label>
                                        <input name="period" type="text" value="{{old('period')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                    <div class="flex flex-col px-5">
                                        <label class="text-gray-700 dark:text-gray-200">Sınav Tarihi</label>
                                        <div class="datepicker " data-mdb-toggle-button="false">
                                            <input type="date" name="exam_date" value="{{old('exam_date')}}" class="form-control block w-full px-4 py-2 mt-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Select a date" />
                                            <button class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                                                <i class="fas fa-calendar datepicker-toggle-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>



                                <div class="flex flex-col px-5">
                                    <label class=" text-gray-700 dark:text-gray-200">Detay</label>
                                    <input name="description" type="text" value="{{old('description')}}" class="form-control block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>



                                <div class="flex flex-row mt-6">
                                    <div class="flex flex-row justify-start items-center px-5">
                                        <label class="flex flex-col text-gray-700 dark:text-gray-200">Aktif</label>
                                        <input type="checkbox" name="is_active" id="" class="flex flex-col checkbox ml-5">
                                    </div>

                                    <div class="flex flex-auto justify-end">
                                        <x-button class="ml-3">
                                            {{ __('Kaydet') }}
                                        </x-button>
                                    </div>

                                </div>

                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->



</x-app-layout>