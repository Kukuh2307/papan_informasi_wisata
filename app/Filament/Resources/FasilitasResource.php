<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Fasilitas;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
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
                                    ->label('Nama Fasilitas')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('bahasa_indonesia')
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
                                    ]),
                                Forms\Components\RichEditor::make('bahasa_inggris')
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
                                    ]),
                            ])->columnSpan(2), // Kolom kiri mengambil 2/3 dari grid

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
                                Forms\Components\FileUpload::make('bahasa_isyarat')
                                    ->label('Upload File Bahasa Isyarat')
                                    ->required(),
                            ])->columnSpan(1), // Kolom kanan mengambil 1/3 dari grid
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
                Tables\Columns\TextColumn::make('bahasa_isyarat')
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
}
