<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @can('edit-profile', $profile)
                Your profile
            @else
                {{ $profile->user->name }}'s profile
            @endcan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="padding:180px; display:flex; align-items:center; justify-content:center"
                    class="p-6 bg-white border-b border-gray-200">
                    {{-- Avatar :  --}}
                    <img style="position: absolute;top: 202px; width:80px;height:125px; background:rgb(245, 250, 245);padding:5px; border-radius:50%" src="/storage/{{ $profile->avatar }}" alt="image">
                    {{-- Username :  --}}
                    <div style="display: block;position: absolute; top:350px">
                        <h1 style="font-size:30px">{{ $profile->user->name }}</h1>
                    </div>
                    {{-- Bio :  --}}
                    <p style="postion:absolute;margin-top:40px;">{{ $profile->bio }}</p>

                    {{-- Edit profile or add friend button :  --}}
                    @can('edit-profile', $profile)
                        <x-a href="/profile/edit/{{ $profile->username }}" value="Edit profile" />
                    @else
                        <x-a href="/profile/edit/{{ $profile->username }}" value="Add friend" />
                    @endcan
                </div>
            </div>
        </div>
    </div>

    {{-- Showing the user's posts : --}}
    <div class="py-12">
        @if ($posts->isEmpty())
            <h2 style="text-align:center; margin-top:180px">- {{ $profile->user->name }} hasn't posted anything yet - </h2>
        @else
            @can('edit-profile', $profile)
                <h2 style="margin-top:-30px;" class="text-center">Your posts</h2>
            @else
                <h2 style="margin-top:-30px;" class="text-center">{{ $profile->user->name }}'s posts</h2>
            @endcan
            <ul>
                @foreach ($posts as $post)
                    <x-post-component :post="$post"/>
                @endforeach
            </ul>
        @endif
    </div>

</x-app-layout>
