<x-app-layout>

    {{-- Heading section :  --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">Your posts</h2>
        <a style="margin-top:-38px;float:right;color:blue;" href="{{ route('posts.create') }}" class="btn">Create a Post</a>
    </x-slot>

    {{-- Main section of the page :  --}}
    <div class="py-12">
        @if ($posts->isEmpty())
            <h2 style="text-align:center; margin-top:180px">- You haven't posted anything yet -</h2>
        @else
            <ul>
                @foreach ($posts as $post)
                    <x-post-component :post="$post"/>
                @endforeach
            </ul>
        @endif
    </div>

</x-app-layout>
