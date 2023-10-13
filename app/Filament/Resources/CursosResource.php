<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CursosResource\Pages;
use App\Filament\Resources\CursosResource\RelationManagers;
use App\Models\Cursos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CursosResource extends Resource
{
    protected static ?string $model = Cursos::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')->maxLength(70)->required(),
                Forms\Components\Select::make('status')->label('Status')->options([
                    'Activo' => 'Activo',
                    'Suspendido' => 'Suspendido',
                    'Cancelado' => 'Cancelado',
                ])->searchable()->preload()->required(),
                Forms\Components\TextInput::make('descripcion')->maxLength(100)->required(),
                Forms\Components\TextInput::make('id_user')->maxLength(20)->required(),
                Forms\Components\TextInput::make('post-name')->maxLength(50)->required(),
                Forms\Components\TextInput::make('post-type')->maxLength(50)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')->searchable(),
                Tables\Columns\TextColumn::make('descripcion')->searchable(),
                Tables\Columns\TextColumn::make('status')->searchable(),
                Tables\Columns\TextColumn::make('post-name')->searchable(),
                Tables\Columns\TextColumn::make('post-type')->searchable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListCursos::route('/'),
            'create' => Pages\CreateCursos::route('/create'),
            'edit' => Pages\EditCursos::route('/{record}/edit'),
        ];
    }
}
