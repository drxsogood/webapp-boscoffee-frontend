<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ( session('status') )
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('status') }} 
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ ( url()->current() == url('/users/add') ) ? url('/users/add'):url('/users/update/' . $user->id) }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="( url()->current() == url('/users/add') ) ? old('name'):$user->name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="( url()->current() == url('/users/add') ) ? old('email'):$user->email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        @if( url()->current() == url('/users/add') ) 
                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="text"
                                                name="password"
                                                autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ $header }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>