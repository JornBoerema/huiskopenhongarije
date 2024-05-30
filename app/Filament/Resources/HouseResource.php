<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HouseResource\Pages;
use App\Models\House;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HouseResource extends Resource
{
    protected static ?string $model = House::class;

    protected static ?string $slug = 'houses';

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Huizen';
    protected static ?string $label = 'Huis';
    protected static ?string $pluralLabel = 'Huizen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Checkbox::make('sold')
                    ->label('Verkocht'),

                Checkbox::make('is_published')
                    ->label('Is gepubliceerd'),

                TextInput::make('title')
                    ->label('Titel')
                    ->required(),

                TextInput::make('subtitle')
                    ->label('Subtitel')
                    ->required(),

                TextInput::make('short_description')
                    ->label('Korte omschrijving')
                    ->required(),

                TextInput::make('price')
                    ->label('Prijs')
                    ->required()
                    ->numeric(),

                RichEditor::make('description')
                    ->label('Omschrijving')
                    ->required()
                    ->columnSpan(2),

                RichEditor::make('surroundings')
                    ->label('Omgeving')
                    ->required()
                    ->columnSpan(2),

                Grid::make(3)
                    ->schema([
                        TextInput::make('surface')
                            ->label('Oppervlakte')
                            ->required()
                            ->integer(),

                        TextInput::make('bedrooms')
                            ->label('Slaapkamers')
                            ->required()
                            ->integer(),

                        TextInput::make('bathrooms')
                            ->label('Badkamers')
                            ->required()
                            ->integer(),
                    ]),

                FileUpload::make('images')
                    ->label('Afbeeldingen')
                    ->multiple()
                    ->image()
                    ->optimize('webp')
                    ->reorderable()
                    ->columns(3)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle'),

                TextColumn::make('price')->money("EUR", locale: "nl-NL"),

                TextColumn::make('surface')->suffix(" m²"),

                TextColumn::make('bedrooms'),

                TextColumn::make('bathrooms'),

                TextColumn::make('surroundings'),

                CheckboxColumn::make('sold'),

                CheckboxColumn::make('is_published'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHouses::route('/'),
            'create' => Pages\CreateHouse::route('/create'),
            'edit' => Pages\EditHouse::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
