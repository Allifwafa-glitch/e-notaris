<?php

namespace App\Filament\Klien\Resources\PengajuanLayanans\Pages;

use App\Filament\Klien\Resources\PengajuanLayanans\PengajuanLayananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengajuanLayanans extends ListRecords
{
    protected static string $resource = PengajuanLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
