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
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('username')
                                <p style="color:red;" class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="bio" class="block text-gray-700 text-sm font-bold mb-2">Bio</label>
                            <textarea id="bio" name="bio" value="{{ old('username') }}"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            @error('bio')
                                <p style="color:red;" class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            <button type="submit"
                                class="font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create
                                Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
