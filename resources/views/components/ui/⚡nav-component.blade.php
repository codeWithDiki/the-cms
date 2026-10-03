<?php

use App\Settings\SiteSettings;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function settings() : array
    {
        $settings = app(SiteSettings::class);

        return [
            "name" => $settings->name,
            "logo_url" => $settings->logo_url
        ];
    }
};
?>

<div>
    <nav class="px-4 py-2 bg-white fixed z-10 w-full top-0 flex justify-between items-center">
        <x-ui.logo :name="$this->settings['name']" :logo_url="$this->settings['logo_url']"/>
        <div class="flex gap-3">
            <div class="relative">
                <h5>Posts</h5>
                <a href="{{ route('posts.index') }}" class="absolute inset-0"></a>
            </div>
        </div>
    </nav>
</div>