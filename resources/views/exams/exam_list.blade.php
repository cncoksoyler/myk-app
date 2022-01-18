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
                <div>
                    <a href="{{route('exams.create')}}">
                        <x-button>
                            {{ __('Add Exam') }}
                        </x-button>
                    </a>
                </div>

                @foreach ($exams as $exam )
               

                @endforeach

            </div>
        </div>
    </div>
    </div>


</x-app-layout>