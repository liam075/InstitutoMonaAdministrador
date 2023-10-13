<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VentasResource\Pages;
use App\Filament\Resources\VentasResource\RelationManagers;
use App\Models\Ventas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VentasResource extends Resource
{
    protected static ?string $model = Ventas::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('vendedor_id')->label('Vendedores')->relationship('vendedores','nombre')->searchable()->preload()->required(),
                Forms\Components\Select::make('estudiantes_id')->relationship('estudiantes','nombre')->searchable()->preload()->required(),
                Forms\Components\TextInput::make('comprobante_venta')->maxLength(20)->required(),
                Forms\Components\DatePicker::make('fecha_venta')->label('Fecha Venta')->maxDate(now())->required(),
                Forms\Components\Select::make('carreras_id')->relationship('cursos','titulo')->searchable()->preload()->required(),
                Forms\Components\Select::make('materias_id')->relationship('cursos','titulo')->searchable()->preload()->required(),
                Forms\Components\Select::make('cursos_id')->relationship('cursos','titulo')->searchable()->preload()->required(),

                Forms\Components\Select::make('se_entero')->label('Como se Entero?')->options([
                    'Facebook' => 'Facebook',
                    'Google' => 'Google',
                    'Twitter' => 'Twitter',
                    'Instagram' => 'Instagram',
                    'Invitacion' => 'Invitacion',
                ])->searchable()->preload()->required(),
                Forms\Components\Textarea::make('comentario')->maxLength(100)->columnSpanFull()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vendedor.nombre')->label('Vendedor')->searchable(),
                Tables\Columns\TextColumn::make('estudiantes.nombre')->label('Estudiantes')->searchable(),
                Tables\Columns\TextColumn::make('comprobante_venta')->searchable(),
                Tables\Columns\TextColumn::make('fecha_venta')->searchable(),
                Tables\Columns\TextColumn::make('cursos.titulo')->label('Cursos')->searchable(),
                Tables\Columns\TextColumn::make('se_entero')->label('Como se Entero?'),
                Tables\Columns\TextColumn::make('comentario')
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
            'index' => Pages\ListVentas::route('/'),
            'create' => Pages\CreateVentas::route('/create'),
            'edit' => Pages\EditVentas::route('/{record}/edit'),
        ];
    }
}
