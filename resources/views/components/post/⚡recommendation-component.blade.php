<?php

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    #[Computed]
    public function recommendation(): Collection
    {
        return Post::query()->isPublish()
            ->whereNot("id", $this->post->id)
            ->where("category_id", $this->post->category->id)
            ->WhereHas("tags", function ($query) {
                $query->whereIn("id", $this->post->tags->pluck("id"));
            })
            ->get();
    }
};
?>

<div class="bg-white shadow-md rounded-lg px-3 py-4 space-y-3">
    <h4 class="text-md">
        Recommendation
    </h4>
    <div class="flex gap-2 flex-nowrap">
        @foreach ($this->recommendation as $post)
        <div class="flex items-center gap-3 w-full relative">
            <div class="rounded-lg border border-zinc-300 flex gap-2 relative">
                <figure class="w-1/3 relative shrink-0 flex-1">
                    <img src="{{ asset($post->thumbnail_url) }}" alt="{{ $post->title }} Thumbnail" class="w-full object-cover rounded-l-lg">
                </figure>
                <div class="w-2/3 relative">
                    <h3>
                        {{ $post->title }}
                    </h3>
                    <p class="text-xs w-full">
                        {{ substr($post->excerpt, 0, 35) }}
                    </p>
                </div>
                <a href="{{ route('posts.show', $post) }}" wire:navigate class="absolute inset-0"></a>
            </div>
        </div>
        @endforeach
    </div>
</div>