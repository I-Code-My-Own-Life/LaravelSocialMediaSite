<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Complete your profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/profile" method="POST" enctype="multipart/form-data"
                        class="max-w-md mx-auto bg-white px-8 pt-6 pb-8 mb-4">
                        @csrf

                        <div class="mb-4">
                            <x-label for="username" :value="__('Username')" />
                            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
                            <x-show-error value="username" />
                        </div>

                        <div class="mb-4">
                            <x-label for="bio" :value="__('Bio')" />
                            <x-textarea value="bio" :placeholder="null" required />
                            <x-show-error value="bio" />
                        </div>

                        <div class="mb-4">
                            <x-label for="avatar" :value="__('Profile picture')" />
                            <x-input id="avatar" class="block mx-1 mt-3 w-full" type="file" name="avatar" :value="old('avatar')" required />
                            <x-show-error value="avatar" />
                        </div>

                        <div class="flex items-center justify-center mt-6">
                            <x-simple-button text="Create Profile " />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
