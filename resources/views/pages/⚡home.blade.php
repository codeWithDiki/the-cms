<?php

use App\Settings\HomePageSettings;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function settings()
    {
        $settings = app(HomePageSettings::class);

        return [
            "heading" => $settings->hero_heading,
            "banner_url" => $settings->hero_banner_url,
            "description" => $settings->hero_description    
        ];
    }
};
?>

<div class="space-y-3 pb-20">
    <div>
        <figure class="relative">
            <img src="{{ $this->settings["banner_url"] }}" alt="Banner" class="w-full min-h-screen object-cover">
            <div class="absolute inset-0 backdrop-blur-sm flex items-center justify-center">
                <div class="bg-indigo-300/50 px-2 py-1 text-white flex flex-col items-center justify-center  max-w-lg">
                    <h1 class="text-5xl text-center font-semibold ">
                        {{ $this->settings['heading'] }}
                    </h1>
                    <p class="text-center">
                        {{ $this->settings['description'] }}
                    </p>
                </div>
            </div>
        </figure>
    </div>
    <div class="mx-auto max-w-5xl space-y-3">
        <h2 class="text-xl font-semibold">
            Posts
        </h2>
        <livewire:post.grid-component />
    </div>
</div>