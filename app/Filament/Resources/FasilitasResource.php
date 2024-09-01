<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Fasilitas;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FasilitasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FasilitasResource\RelationManagers;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('fasilitas')
                                    ->label('Nama Fasilitas (Bahasa Indonesia)')
                                    ->required()
                                    ->maxLength(255)
                                    ->afterStateUpdated(function (?string $state, Set $set) {
                                        if ($state !== null && $state !== '') {
                                            $translatedText = self::translateText($state);
                                            $set('translate_fasilitas', $translatedText);
                                        } else {
                                            $set('translate_fasilitas', '');
                                        }
                                    })
                                    ->lazy(),

                                Forms\Components\TextInput::make('translate_fasilitas')
                                    ->label('Nama Fasilitas (Bahasa Inggris)')
                                    ->default('')
                                    ->readOnly()
                                    ->reactive(),

                                Forms\Components\TextInput::make('bahasa_isyarat')
                                    ->label('Link video bahasa isyarat')
                                    ->required(),

                                RichEditor::make('bahasa_indonesia')
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
                                            $set('bahasa_inggris', $translatedText);
                                        } else {
                                            $set('bahasa_inggris', '');
                                        }
                                    })
                                    ->reactive()
                                    ->required(),

                                Forms\Components\Textarea::make('bahasa_inggris')
                                    ->label('Deskripsi (Bahasa Inggris)')
                                    ->default('')
                                    ->readOnly()
                                    ->extraAttributes([
                                        'style' => 'height: 250px; width: 100%; opacity: 0.7;',
                                    ])
                                    ->reactive(),




                            ])->columnSpan(2),

                        Grid::make(1)
                            ->schema([
                                Forms\Components\FileUpload::make('image1')
                                    ->label('Foto 1')
                                    ->image()
                                    ->required(),
                                Forms\Components\FileUpload::make('image2')
                                    ->label('Foto 2')
                                    ->image()
                                    ->required(),
                                Forms\Components\FileUpload::make('icon')
                                    ->label('icon')
                                    ->image()
                                    ->required(),
                                // Forms\Components\FileUpload::make('bahasa_isyarat')
                                //     ->label('Upload File Bahasa Isyarat')
                                //     ->required(),
                            ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fasilitas')
                    ->label('Nama Fasilitas')
                    ->searchable(),
                // Tables\Columns\ImageColumn::make('icon')
                //     ->label('Icon')
                //     ->searchable(),
                Tables\Columns\ImageColumn::make('bahasa_isyarat')
                    ->label('Bahasa Isyarat')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image1')
                    ->label('Foto 1')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image2')
                    ->label('Foto 2')
                    ->searchable(),
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
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
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
        if (empty($data['translate_fasilitas'])) {
            $data['translate_fasilitas'] = self::translateText($data['fasilitas'] ?? '');
        }
        if (empty($data['bahasa_inggris'])) {
            $data['bahasa_inggris'] = self::translateText(strip_tags($data['bahasa_indonesia'] ?? ''));
        }
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        return self::mutateFormDataBeforeCreate($data);
    }
}
