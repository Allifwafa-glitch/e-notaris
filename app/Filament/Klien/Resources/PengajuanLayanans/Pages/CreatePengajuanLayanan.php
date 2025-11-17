<?php

namespace App\Filament\Klien\Resources\PengajuanLayanans\Pages;

use App\Filament\Klien\Resources\PengajuanLayanans\PengajuanLayananResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Wizard\Step;

use function Laravel\Prompts\select;

class CreatePengajuanLayanan extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;
    protected static string $resource = PengajuanLayananResource::class;

        protected function getSteps(): array
        {
            return [
                Step::make('Informasi Klien')
                    ->description('Give the category a clear and unique name')
                    ->schema([
                        TextInput::make('nama_klien')
                            ->required()
                            ->live(),
                        // TextInput::make('alamat')
                        //     ->required(),
                        // TextInput::make('no_telepon')
                        //     ->required(),
                    ]),
                Step::make('Detail Pengajuan')
                    ->description('Add some extra details')
                    ->schema([
                        select::make('judul')
                            ->options([
                                'Pembuatan Akta' => 'Pembuatan Akta',
                                'Legalisasi Dokumen' => 'Legalisasi Dokumen',
                                'Konsultasi Hukum' => 'Konsultasi Hukum',
                                'Layanan Notaris Lainnya' => 'Layanan Notaris Lainnya',
                            ])
                            ->required(),
                        select::make('jenis_layanan')
                            ->options([
                                'PPAT' => 'PPAT',
                                'Notaris' => 'Notaris',
                            ])
                            ->required(),
                    ]),
                Step::make('Catatan Tambahan')
                    ->description('Control who can view it')
                    ->schema([
                        TextArea::make('keterangan')
                            ->columnSpanFull(),
                    ]),
            ];
        }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }
}
