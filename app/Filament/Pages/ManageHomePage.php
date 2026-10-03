<?php

namespace App\Filament\Pages;

use App\Settings\HomePageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageHomePage extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = HomePageSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->columns(1)
                ->schema([
                    FileUpload::make('hero_banner_url')->image(),
                    TextInput::make('hero_heading'),
                    TextInput::make('hero_description'),
                ])
            ])
            ->columns(1);
    }
}
