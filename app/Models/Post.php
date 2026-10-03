<?php

namespace App\Models;

use App\Concerns\InteractsWithSeo;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Tags\HasTags;

#[Guarded([])]
class Post extends Model
{
    use HasTags, InteractsWithSeo;

    protected $casts = [
        "content" => "json",
        "publish_at" => "datetime"
    ];


    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    public function isPublish(Builder $query)
    {
        $query->where("is_publish", true);
    }

}
