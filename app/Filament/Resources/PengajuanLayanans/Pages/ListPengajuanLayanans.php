<?php

namespace App\Filament\Resources\PengajuanLayanans\Pages;

use App\Filament\Resources\PengajuanLayanans\PengajuanLayananResource;
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

    public static function canCreate(): bool
    {
        return false;
    }
    public static function getCreateButtonLabel(): string
    {
        return 'Tambah Pengajuan Baru';
    }
}
