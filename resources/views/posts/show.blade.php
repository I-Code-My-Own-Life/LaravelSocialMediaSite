{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @can('edit-profile',$profile)
                Your post
                @else
                {{ $profile->user->name }}'s post
            @endcan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="padding:180px; display:flex; align-items:center; justify-content:center" class="p-6 bg-white border-b border-gray-200"> --}}
                    {{-- Avatar :  --}}
                    {{-- <img style="position: absolute;top: 202px; width:80px;height:125px; background:rgb(245, 250, 245);padding:5px; border-radius:50%" src="/storage/{{ $post->image }}" alt="image">
                    <div style="display: block;position: absolute; top:350px">
                        <h1 style="font-size:30px">{{ $post->user->name }}</h1>
                    </div>
                    <p style="postion:absolute;margin-top:40px;">{{ $post->content }}</p>
                    @can('edit-profile', $post)
                        <a href="/profile/edit/{{ $post->username }}" style="position: absolute;margin-top:250px;color:blue;">Edit profile</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@dd($post)