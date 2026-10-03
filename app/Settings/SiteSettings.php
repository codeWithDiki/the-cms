<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public ?string $name = "The POS";
    public ?string $description = null;
    public ?string $owner_name = null;
    public ?string $contact_email = null;
    public ?string $logo_url = null;

    public static function group() : string
    {
        return "site";
    }

}