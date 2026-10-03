<?php

namespace App\Models;

use App\Concerns\InteractsWithSeo;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Guarded([])]
class Category extends Model
{
    use InteractsWithSeo;
    

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
