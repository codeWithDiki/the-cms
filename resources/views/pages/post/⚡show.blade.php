<?php

use App\Models\Post;
use Livewire\Component;

new class extends Component
{
    public Post $post;

    public function mount(Post $post) : void
    {
        $this->post = $post;
    }
};
?>

@section("title", $post->title)

@push("seo")
    <x-props.seo-metadata :title="$post->seo_title" :description="$post->seo_description" :thumbnail_url="asset($post->seo_thumbnail)" :keywords="$post->seo_keywords" />
@endpush

<div class="">
    <div>
        <figure class="relative">
            <img src="{{ asset($this->post->thumbnail_url) }}" alt="Banner" class="w-full min-h-screen object-cover">
            <div class="absolute inset-0 backdrop-blur-sm flex items-center justify-center">
                <div class="bg-indigo-300/50 px-2 py-1 text-white flex flex-col items-center justify-center  max-w-lg">
                    <h1 class="text-5xl text-center font-semibold ">
                        {{ $this->post->title }}
                    </h1>
                    <p class="text-center">
                        {{ $this->post->excerpt }}
                    </p>
                </div>
            </div>
        </figure>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-3 px-4">
        <div class="bg-white rounded-lg w-full lg:col-span-4 shadow-md">
            <div class="prose prose-xl mx-auto px-3 py-4 ">
                {!! $post->content !!}
            </div>
        </div>
        <div class="col-span-1 space-y-3 py-3">
            <div class="bg-white shadow-md rounded-lg px-3 py-4 space-y-3">
                <h4 class="text-md">
                    Post Information
                </h4>
                <ul>
                    <li>
                        Created : {{ $post->created_at->format("Y/m/d H:i:s") }}
                    </li>
                </ul>
            </div>
            <div class="bg-white shadow-md rounded-lg px-3 py-4 space-y-3">
                <h4 class="text-md">
                    Tags
                </h4>
                <div class="flex gap-2 flex-wrap">
                    @foreach ($post->tags as $tag)
                        <div class="px-2 py-1 bg-zinc-800 text-white rounded-md">
                            {{ $tag->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <livewire:post.recommendation-component :post="$post" />
        </div>
    </div>
</div>