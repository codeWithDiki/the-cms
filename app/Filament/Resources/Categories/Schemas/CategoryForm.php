<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make([
                    "lg" => 3,
                    "defult" => 1
                ])
                ->schema([
                    Section::make("Category Fields")
                    ->schema([
                        Grid::make([
                            "lg" => 2,
                            "default" => 1
                        ])
                        ->schema([
                            TextInput::make('name')
                                ->live(debounce:500)
                                ->afterStateUpdated(fn(?string $state, callable $set) => $set("slug", \Illuminate\Support\Str::slug($state)))
                                ->required(),
                            TextInput::make('slug')
                                ->required(),
                        ]),
                        Textarea::make('description')
                            ->maxLength(255),
                        Toggle::make('is_publish')
                            ->required(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
                    Section::make("SEO Fields")
                    ->schema([
                        FileUpload::make('seo_thumbnail')->image(),
                        TextInput::make('seo_title'),
                        Textarea::make('seo_description'),
                        TagsInput::make('seo_keywords')
                            ->columnSpanFull(),
                        Toggle::make("is_publish")
                    ])
                    ->columnSpanFull()
                ])
            ])
            ->columns(1);
    }
}
