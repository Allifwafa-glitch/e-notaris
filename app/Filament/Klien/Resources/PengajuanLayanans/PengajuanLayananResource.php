<?php

namespace App\Filament\Klien\Resources\PengajuanLayanans;

use App\Filament\Klien\Resources\PengajuanLayanans\Pages\CreatePengajuanLayanan;
use App\Filament\Klien\Resources\PengajuanLayanans\Pages\EditPengajuanLayanan;
use App\Filament\Klien\Resources\PengajuanLayanans\Pages\ListPengajuanLayanans;
use App\Filament\Klien\Resources\PengajuanLayanans\Schemas\PengajuanLayananForm;
use App\Filament\Klien\Resources\PengajuanLayanans\Tables\PengajuanLayanansTable;
use App\Models\PengajuanLayanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PengajuanLayananResource extends Resource
{
    protected static ?string $model = PengajuanLayanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function beforeCreate($record): void
    {
        $record->status = 'proses';
        $record->user_id = Auth::id();
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

    public static function getPages(): array
    {
        return [
            'index' => ListPengajuanLayanans::route('/'),
            'create' => CreatePengajuanLayanan::route('/create'),
            'edit' => EditPengajuanLayanan::route('/{record}/edit'),
        ];
    }
}
