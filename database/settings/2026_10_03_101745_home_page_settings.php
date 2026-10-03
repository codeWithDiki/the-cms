<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add("home_page.hero_heading", "The POS");
        $this->migrator->add("home_page.hero_description", "Lorem Ipsum");
        $this->migrator->add("home_page.hero_banner_url", null);
    }

    public function down(): void
    {
        $this->migrator->delete("home_page.hero_heading");
        $this->migrator->delete("home_page.hero_description");
        $this->migrator->delete("home_page.hero_banner_url");
    }

};
