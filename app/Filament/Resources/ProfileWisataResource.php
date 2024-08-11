<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileWisataResource\Pages;
use App\Filament\Resources\ProfileWisataResource\RelationManagers;
use App\Models\ProfileWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('nama_wisata')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('luas_wisata')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('tahun_peresmian')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('pengelola')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('lokasi')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('deskripsi')
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
                            ])->columnSpan(2),

                        Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('images')
                                    ->required(),
                                Forms\Components\FileUpload::make('qrcode')
                                    ->image()
                                    ->directory('images')
                                    ->required()
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
}
