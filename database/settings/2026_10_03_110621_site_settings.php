<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add("site.name", "The CMS");
        $this->migrator->add("site.description", "The CMS");
        $this->migrator->add("site.logo_url", null);
        $this->migrator->add("site.owner_name", "Diki Akbar Asyidiq");
        $this->migrator->add("site.contact_email", "me@dikiakbarasyidiq.dev");
    }

    public function down() : void
    {
        $this->migrator->delete("site.name");
        $this->migrator->delete("site.description");
        $this->migrator->delete("site.logo_url");
        $this->migrator->delete("site.owner_name");
        $this->migrator->delete("site.contact_email");
    }
};
