<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sliders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ( session('message') )
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('message') }} 
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ url('/sliders/'.$slider->id) }}" enctype = "multipart/form-data">
                        @csrf
                        @method('PUT')
{{-- 
                        <div class = "mb-4">
                            <label class="font-bold">Title</label>
                            <input type = "text" name = "title" value = "{{$slider->title}}" class = "block mt-1 w-full text-black">
                        </div> --}}
                        <div class = "mb-4"> 
                            <label class="font-bold">Description</label>
                            <textarea class = "block mt-1 w-full text-black" name = "description" rows = "3">{{$slider->description}}</textarea>
                        </div>
                        {{-- <div class = "mb-4">
                            <label class="font-bold">Image</label>
                            <input type = "file" name="image" class = "block mt-1 ">
                            <img src="{{ asset($slider->image) }}" class="h-32 w-full object-cover" alt="Slider">
                        </div> --}}
                        {{-- <div class = "mb-3">
                            <label>Status</label>
                            <input type = "checkbox" name = "status" {{$slider->status == '1' ? 'Checked':'' }} class = "block mt-1">
                            Check = hidden, Unchecked = Visible
                        </div> --}}
                        <div class = "mb-4 text-center">
                            {{-- <button type = "Submit"  class = "block mt-1 w-full">Update</button> --}}
                            <button type="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Update</button>
                        </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
 