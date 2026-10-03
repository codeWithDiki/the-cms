<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make([
                    "lg" => 3,
                    "default" => 1
                ])
                    ->schema([
                        Grid::make([
                            "default" => 1
                        ])
                            ->schema([

                                Section::make("Post Fields")
                                    ->schema([
                                        FileUpload::make('thumbnail_url')->image(),
                                        Select::make('user_id')
                                            ->label("Author")
                                            ->relationship('author', 'name')
                                            ->required(),
                                        Select::make('category_id')
                                            ->relationship('category', 'name')
                                            ->required(),
                                        TextInput::make('title')
                                            ->live(debounce:500)
                                            ->afterStateUpdated(fn(?string $state, callable $set) => $set("slug", \Illuminate\Support\Str::slug($state)))
                                            ->required(),
                                        TextInput::make('slug')
                                            ->required(),
                                        Textarea::make('excerpt')->maxLength(150),
                                        RichEditor::make('content')
                                            ->required()
                                            ->columnSpanFull(),
                                        SpatieTagsInput::make("tags"),
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
                                    ])
                                    ->columnSpanFull()

                            ])
                            ->columnSpan([
                                "lg" => 2,
                                "default" => 1
                            ]),
                        Section::make()
                            ->schema([
                                Toggle::make('is_publish')
                                    ->required(),
                                DateTimePicker::make("publish_at")
                            ])
                    ])
            ])
            ->columns(1);
    }
}
