<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Images extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('images')
            ->schema([
                Repeater::make('images')
                    ->schema([
                        FileUpload::make('image')
                            ->optimize('webp')
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
