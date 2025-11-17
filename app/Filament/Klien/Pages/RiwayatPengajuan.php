<?php

namespace App\Filament\Klien\Pages;

use view;
use Filament\Pages\Page;
use Filament\Tables\Table;
use App\Models\PengajuanLayanan;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Filament\Klien\Resources\PengajuanLayanans;
use BackedEnum;


class RiwayatPengajuan extends Page implements HasTable
{
    use InteractsWithTable;

    protected string $view = 'filament.klien.pages.riwayat-pengajuan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArchiveBox;

    public static function getNavigationSort(): int
    {
        return 3; // angka kecil = posisi atas
    }


    public function table(Table $table): Table
    {
        // dd(Auth::id());
        return $table
        
            ->query(
                PengajuanLayanan::query()
                    ->where('user_id', Auth::id()) // ⬅️ Menampilkan hanya milik klien login
                    ->where('status', 'approved')
            )
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('nama_klien')
                    ->searchable(),
                TextColumn::make('jenis_layanan')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

}