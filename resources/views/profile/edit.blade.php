<x-app-layout>
    {{-- Header section :  --}}
    <x-slot name="header">
        <h2 style="color:blue;" class="font-semibold text-xl text-gray-800 leading-tight text-center">Edit your profile
        </h2>
    </x-slot>

    {{-- Main section :  --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/profile" method="POST" enctype="multipart/form-data"
                        class="max-w-md mx-auto bg-white px-8 pt-6 pb-8 mb-4">
                        {{-- CSRF token :  --}}
                        @csrf

                        {{-- Username field :  --}}
                        <div class="mb-4">
                            <x-label for="username" :value="__('Username')" />
                            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$profile->username" required />
                            <x-show-error value="username" />
                        </div>

                        {{-- Bio-data field : --}}
                        <div class="mb-4">
                            <x-label for="bio" :value="__('Bio')" />
                            <x-textarea value="bio" :placeholder="$profile->bio" />
                             <x-show-error value="bio" />
                        </div>

                        <div class="mb-4">
                            <label for="avatar" class="block text-gray-700 text-sm font-bold mb-2">Profile
                                picture</label>
                            <input type="file" id="avatar" name="avatar"
                                class="appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('avatar')
                                <p style="color:red;" class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-center mt-6">
                            <button type="submit" style="color:blue;"
                                class="font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit
                                Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
