<?php

namespace App\Filament\Resources\PengajuanLayanans;

use App\Filament\Resources\PengajuanLayanans\Pages\CreatePengajuanLayanan;
use App\Filament\Resources\PengajuanLayanans\Pages\EditPengajuanLayanan;
use App\Filament\Resources\PengajuanLayanans\Pages\ListPengajuanLayanans;
use App\Filament\Resources\PengajuanLayanans\Pages\ViewPengajuanLayanan;
use App\Filament\Resources\PengajuanLayanans\Schemas\PengajuanLayananForm;
use App\Filament\Resources\PengajuanLayanans\Tables\PengajuanLayanansTable;
use App\Models\PengajuanLayanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class PengajuanLayananResource extends Resource
{
    protected static ?string $model = PengajuanLayanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getLabel(): string
    {
        return 'Pengajuan';
    }

    public static function getPluralLabel(): string
    {
        return 'Pengajuan Layanan';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pengajuan';
    }
    protected static bool $hasTitleCaseModelLabel = false;
    

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return PengajuanLayananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengajuanLayanansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function beforeSave($record): void
    {
        if ($record->isDirty('status') && $record->status === 'approved' && !$record->dokumen_path) {
            $pdf = Pdf::loadView('pdf.pengajuan', ['pengajuan' => $record]);

            $path = "dokumen/{$record->id}.pdf";
            Storage::disk('public')->put($path, $pdf->output());

            $record->dokumen_path = $path;
        }
    }




    public static function getPages(): array
    {
        return [
            'index' => ListPengajuanLayanans::route('/'),
            'create' => CreatePengajuanLayanan::route('/create'),
            'edit' => EditPengajuanLayanan::route('/{record}/edit'),
            'view' => ViewPengajuanLayanan::route('/{record}/view')
        ];
    }
}
