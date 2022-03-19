<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sınav Detayı') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->


    <div class="flex flex-col m-6 px-10">


        <div class="flex pt-6 px-6">
            <div class="flex flex-col col-start-2">
                <a href="{{route('exams.create')}}">
                    <x-button>
                        {{ __('Sınav Ekle') }}
                    </x-button>
                </a>
            </div>
            <div class="flex flex-col col-start-6 ml-10">
                <!-- Session Message -->
                <x-message-status class="mb-4 text-black" :message="session('message')" />

            </div>

        </div>



        <div class="flex flex-wrap pt-6">

            @foreach ($exams as $exam )
            <div class="mt-6">
                <a href="{{route('results.show',$exam->id)}}">
                    <div class="px-6 group ">
                        <div class="px-4 py-3 bg-white group-hover:bg-slate-400 rounded-md shadow-md">
                            <div>
                                <span class="text-sm font-light text-gray-800 dark:text-gray-400">{{$exam->name}}</span>
                                <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">{{$exam->period}}</span>
                            </div>

                            <div>
                                <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{$exam->name}}</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{$exam->description}}</p>
                            </div>


                            <div class="flex flex-nowrap text-gray-700 dark:text-gray-200  ">
                                <span>Sınav Tarihi:</span>
                                <a class="mx-2 text-blue-600 dark:text-blue-400 hover:underline">{{$exam->exam_date}}</a>
                            </div>

                        </div>
                    </div>

                </a>
            </div>

            @endforeach
        </div>


    </div>

    </div>


</x-app-layout>