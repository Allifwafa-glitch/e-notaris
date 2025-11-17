<?php

namespace App\Filament\Resources\PengajuanLayanans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Select;

class PengajuanLayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required(),
                TextInput::make('nama_klien')
                    ->label('Nama Klien')
                    ->required(),
                TextInput::make('jenis_layanan')
                    ->label('Jenis Layanan')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])->required(),
                TextArea::make('keterangan')
                    ->label('Keterangan')
                    ->nullable(),
            ]);
    }
}
