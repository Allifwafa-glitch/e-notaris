<?php

namespace App\Filament\Klien\Resources\PengajuanLayanans\Pages;

use App\Filament\Klien\Resources\PengajuanLayanans\PengajuanLayananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengajuanLayanan extends EditRecord
{
    protected static string $resource = PengajuanLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
