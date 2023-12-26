<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriasResource\Pages;
use App\Filament\Resources\MateriasResource\RelationManagers;
use App\Models\Materias;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class MateriasResource extends Resource
{
    protected static ?string $model = Materias::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->maxLength(200)->columnSpanFull()->required(),
                Forms\Components\Select::make('status')->label('Status')->options([
                    'Activo' => 'Activo',
                    'Suspendido' => 'Suspendido',
                    'Cancelado' => 'Cancelado',
                ])->searchable()->preload()->columnSpanFull()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->label('Nombre')->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Status')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Fecha de Creacion'),
                Tables\Columns\TextColumn::make('updated_at')->label('Fecha de Actualización')
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMaterias::route('/create'),
            'edit' => Pages\EditMaterias::route('/{record}/edit'),
        ];
    }
}
