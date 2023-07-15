@props(['post'])

<div style="margin-left:150px; margin-top: 50px; background:#fbfbfb; width: 800px;">
    <div style="border: none; padding:20px" class="card text-center">
        <img style="width:250px;height:250px;" src="/storage/{{ $post->image }}" class="card-img-top mx-auto"
            alt="Post Image">
        <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <x-button style="background:rgb(5 140 255);" class="ml-4">
                        {{ __('Like') }}
                    </x-button>
                </div>
                <div class="col-auto">
                    <x-button id="btn{{ $post->id }}" style="background:rgb(5 140 255);" class="ml-4">
                        {{ __('See comments') }}
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>
