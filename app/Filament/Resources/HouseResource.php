<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HouseResource\Pages;
use App\Models\House;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
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
                TextInput::make('title')
                    ->required(),

                TextInput::make('subtitle')
                    ->required(),

                TextInput::make('short_description')
                    ->required(),

                RichEditor::make('description')
                    ->required()
                    ->columnSpan(2),

                RichEditor::make('surroundings')
                    ->required()
                    ->columnSpan(2),

                TextInput::make('price')
                    ->required()
                    ->numeric(),

                TextInput::make('surface')
                    ->required()
                    ->integer(),

                TextInput::make('bedrooms')
                    ->required()
                    ->integer(),

                TextInput::make('bathrooms')
                    ->required()
                    ->integer(),

                Checkbox::make('sold'),

                Checkbox::make('is_published'),

                FileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->optimize('webp')
                    ->reorderable()
                    ->columns(2)
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
