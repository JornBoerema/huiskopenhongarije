<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Text extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('text')
            ->schema([
                RichEditor::make('text')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
