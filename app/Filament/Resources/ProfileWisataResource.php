<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileWisataResource\Pages;
use App\Filament\Resources\ProfileWisataResource\RelationManagers;
use App\Models\ProfileWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\FormsComponent;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileWisataResource extends Resource
{
    protected static ?string $model = ProfileWisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('nama_wisata')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('luas_wisata')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('tahun_peresmian')
                                    ->required(),
                                Forms\Components\TextInput::make('pengelola')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('lokasi')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('qrcode')
                                    ->label('Link video bahasa isyarat')
                                    ->required()
                                    ->maxLength(255),

                                RichEditor::make('deskripsi')
                                    ->label('Deskripsi (Bahasa Indonesia)')
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        'underline',
                                        'undo',
                                    ])
                                    ->afterStateUpdated(function (?string $state, Set $set) {
                                        if ($state !== null && $state !== '') {
                                            $translatedText = self::translateText(strip_tags($state));
                                            $set('translate_deskripsi', $translatedText);
                                        } else {
                                            $set('translate_deskripsi', '');
                                        }
                                    })
                                    ->reactive()
                                    ->required(),

                                Forms\Components\Textarea::make('translate_deskripsi')
                                    ->label('Deskripsi (Bahasa Inggris)')
                                    ->default('')
                                    ->readOnly()
                                    ->extraAttributes([
                                        'style' => 'height: 250px; width: 100%; opacity: 0.7; overflow: hidden; resize: none; word-wrap: break-word;',
                                    ])
                                    ->reactive(),

                            ])->columnSpan(2),

                        Grid::make(1)
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('images')
                                    ->required(),
                            ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_wisata')
                    ->searchable(),
                Tables\Columns\TextColumn::make('luas_wisata')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_peresmian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengelola')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProfileWisatas::route('/'),
            'create' => Pages\CreateProfileWisata::route('/create'),
            'edit' => Pages\EditProfileWisata::route('/{record}/edit'),
        ];
    }

    private static function translateText(string $text): string
    {
        if (empty($text)) {
            return '';
        }

        try {
            $response = Http::withHeaders([
                'content-type' => 'application/json',
                'X-RapidAPI-Key' => config('services.rapidapi.key'),
                'X-RapidAPI-Host' => 'ultra-fast-translation.p.rapidapi.com',
            ])->post('https://ultra-fast-translation.p.rapidapi.com/t', [
                'from' => 'id-ID',
                'to' => 'en-GB',
                'e' => '',
                'q' => [$text],
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data[0] ?? $text;
            }
        } catch (\Exception $e) {
            // Log error jika diperlukan
            // \Log::error('Translation error: ' . $e->getMessage());
        }

        return $text; // Kembalikan teks asli jika terjemahan gagal
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['translate_deskripsi'])) {
            $data['translate_deskripsi'] = self::translateText(strip_tags($data['deskripsi'] ?? ''));
        }
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        return self::mutateFormDataBeforeCreate($data);
    }
}
