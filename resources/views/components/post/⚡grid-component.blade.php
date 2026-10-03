<?php

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public int $max_posts = 6;

    public bool $is_paginated = false;

    public function mount($max_posts = 6, $is_paginated = false)
    {
        $this->max_posts = $max_posts;
        $this->is_paginated = $is_paginated;
    }

    #[Computed]
    public function posts() : Collection|LengthAwarePaginator
    {
        if($this->is_paginated){
            return Post::query()
            ->isPublish()
            ->paginate($this->max_posts);
        }

        return Post::query()
        ->isPublish()
        ->when($this->max_posts, function($query){
            $query->limit($this->max_posts);
        })
        ->get();
    }


};
?>
<div>

    <div class="grid grid-cols-3 gap-3">
        @foreach($this->posts as $post)
            <div class="rounded-lg border bg-white space-y-2 relative">
                <figure>
                    <img src="{{ $post->thumbnail_url ?? 'https://placehold.co/600x400' }}" alt="{{ $post->title }} thumbnail" class="rounded-t-lg">
                </figure>
                <div class="space-y-1 px-2 py-1">
                    <h3>
                        {{ $post->title }}
                    </h3>
                    <span class="block">
                        {{ $post->excerpt }}
                    </span>
                </div>
                <a href="{{ route('posts.show', $post) }}" wire:navigate class="absolute inset-0"></a>
            </div>
        @endforeach
    </div>
    @if($is_paginated)
        <div class="max-w-md mx-auto">
            {{ $this->posts->links() }}
        </div>
    @endif
</div>