<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables\Table;
use App\Models\PengajuanLayanan;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class DokumenArsip extends Page Implements HasTable
{
    use InteractsWithTable;
    protected string $view = 'filament.pages.dokumen-arsip';

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
            ])
            ->recordActions([
                Action::make('Unduh PDF')
                    ->label('Unduh')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn ($record) => route('dokumen.download', $record))
                    ->openUrlInNewTab(),
            ]);

    }
}
