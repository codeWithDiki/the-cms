<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSite extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = SiteSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    FileUpload::make('logo_url')->image(),
                    TextInput::make('name'),
                    TextInput::make('description'),
                    TextInput::make('owner_name'),
                    TextInput::make('contact_email')
                        ->email(),
                ])
            ])
            ->columns(1);
    }
}
