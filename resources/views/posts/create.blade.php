<x-app-layout>
    {{-- Header section --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Create a post
        </h2>
    </x-slot>

    {{-- Main section of the page --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
                        class="max-w-md mx-auto bg-white px-8 pt-6 pb-8 mb-4">
                        {{-- CRSF token :  --}}
                        @csrf
                        
                        {{-- Content :  --}}
                        <div class="mb-4">
                            <x-label for="username" :value="__('Write something here ...')"/>
                            <x-textarea value="content" :placeholder="null" required />
                            <x-show-error value="content" />
                        </div>

                        {{-- Post image : --}}
                        <div class="mb-4">
                            <x-label for="username" :value="__('Add a photo')" />
                            <x-input id="image" class="block mx-1 mt-3 w-full" type="file" name="image" :value="old('image')" required/>
                            <x-show-error value="image" />
                        </div>
                        
                        {{-- Button to post :  --}}
                        <div class="flex items-center justify-center mt-6">
                            <x-button style="background:blue;" class="ml-4">
                                {{ __('Post') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
