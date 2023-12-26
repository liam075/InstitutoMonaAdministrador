<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendedoresResource\Pages;
use App\Filament\Resources\VendedoresResource\RelationManagers;
use App\Models\Vendedores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class VendedoresResource extends Resource
{
    protected static ?string $model = Vendedores::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->maxLength(50)->required(),
                Forms\Components\TextInput::make('apellido')->maxLength(50)->required(),
                Forms\Components\TextInput::make('documento_identidad')->maxLength(10)->required(),
                Forms\Components\DatePicker::make('fecha_nacimiento')->maxDate(now())->required(),
                Forms\Components\TextInput::make('direccion')->maxLength(100)->required(),
                Forms\Components\TextInput::make('ventas_hechas')->maxLength(10)->required(),
                Forms\Components\TextInput::make('usuario')->maxLength(30)->required(),
                Forms\Components\TextInput::make('contraseña')->maxLength(50)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('apellido')->searchable(),
                Tables\Columns\TextColumn::make('usuario')->searchable(),
                Tables\Columns\TextColumn::make('documento_identidad')->searchable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')->sortable(),
                Tables\Columns\TextColumn::make('direccion'),
                Tables\Columns\TextColumn::make('ventas_hechas'),
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
                    ExportBulkAction::make(),
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
            'index' => Pages\ListVendedores::route('/'),
            'create' => Pages\CreateVendedores::route('/create'),
            'edit' => Pages\EditVendedores::route('/{record}/edit'),
        ];
    }
}
