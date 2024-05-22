<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Title extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('title')
            ->schema([
                TextInput::make('title')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
