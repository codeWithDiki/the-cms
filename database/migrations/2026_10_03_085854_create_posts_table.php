<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Category::class);
            $table->string("title");
            $table->string("slug")->unique();
            $table->string("excerpt")->nullable();
            $table->longText("content");
            $table->boolean("is_publish")->default(false);
            $table->string("thumbnail_url")->nullable();

            $table->string("seo_title")->nullable();
            $table->string("seo_description")->nullable();
            $table->text("seo_keywords")->nullable();
            $table->string("seo_thumbnail")->nullable();

            $table->dateTime("publish_at")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
