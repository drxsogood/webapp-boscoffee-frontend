<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Announcement') }}
        </h2>
    </x-slot>

    <div class = "py-12">
        <div class = "col-md-12">
            @if ( session('status') )
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('status') }} 
                </div>
            </div>
        @endif

        <div class="">
    <h3 class="text-center text-2xl font-bold">Slider List</h3>
</div>
{{-- <div class="flex items-center justify-center my-8">
    <a href="{{ url('/sliders/create')}}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg">
        Add Slider
    </a>
</div> --}}
    <div class="flex items-center justify-center my-8">
        <a href="{{ url('/sliders/create') }}">
            <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-bold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add Slider +</button>
        </a>
    </div>

    <div class="mx-auto mt-8">
                    {{-- <table class="table-auto w-full text-center"> --}}
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <!-- <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">ID</th> -->
                            {{-- <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Title</th> --}}
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Description</th>
                            {{-- <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">Image</th> --}}
                            <!-- <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">Status</th> -->
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">Action</th>
                            </tr>
                            </thead>
                            <tbody class="block md:table-row-group">
                        @foreach ($sliders as $slider)
                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        {{-- <!-- <td class="p-1">{{$slider->id}}</td> --> --}}
                            {{-- <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$slider->title}}</td> --}}
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$slider->description}}</td>
                            {{-- <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <img src="{{ asset($slider->image)}}" class="h-32 w-full object-cover" alt="Slider">
                            </td> --}}
                            {{-- <!-- <td class="p-1">{{$slider->status == '0' ? 'Visible':'Hidden' }}</td> --> --}}
                            <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell">
                            {{-- <a href = "{{ url('/sliders/'.$slider->id.'/edit')}}" class = "btn btn-success bg-green-500 text-white">Edit</a>
                            <a href = "{{ url('/sliders/'.$slider->id.'/delete')}}" 
                            onclick="return confirm('Are you sure you want to delete this Slider?');"
                            class = "btn btn-danger bg-red-500 text-white">Delete</a> --}}
                            
                            <a href="{{ url('/sliders/'.$slider->id.'/edit')}}">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Update</button>
                                        </a>
                            <a href="{{ url('/sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this Slider?');">
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                        </a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
        

</x-app-layout>