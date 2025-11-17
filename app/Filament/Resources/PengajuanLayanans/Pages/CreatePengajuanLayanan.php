<?php

namespace App\Filament\Resources\PengajuanLayanans\Pages;

use App\Filament\Resources\PengajuanLayanans\PengajuanLayananResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;


class CreatePengajuanLayanan extends CreateRecord
{
    protected static string $resource = PengajuanLayananResource::class;

    protected static bool $canCreateAnother = false;

    public static function canCreate(): bool
    {
        return false;
    }

}
