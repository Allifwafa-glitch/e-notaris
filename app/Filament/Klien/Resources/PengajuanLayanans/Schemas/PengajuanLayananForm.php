<?php

namespace App\Filament\Klien\Resources\PengajuanLayanans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PengajuanLayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('nama_klien')
                    ->required(),
                TextInput::make('jenis_layanan')
                    ->required(),
                Textarea::make('keterangan')
                    ->columnSpanFull(),
                
                // TextInput::make('status')
                //     ->label('Status Pengajuan')
                //     ->disabled(),
            ]);
    }
}
