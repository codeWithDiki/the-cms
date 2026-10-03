<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomePageSettings extends Settings
{
    public ?string $hero_heading = "The POS";
    public ?string $hero_description = "Lorem ipsum dolor sit amet";
    public ?string $hero_banner_url = null;

    public static function group(): string
    {
        return "home_page";
    }
}