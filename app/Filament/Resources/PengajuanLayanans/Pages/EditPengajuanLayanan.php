<?php

namespace App\Filament\Resources\PengajuanLayanans\Pages;

use App\Filament\Resources\PengajuanLayanans\PengajuanLayananResource;
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
