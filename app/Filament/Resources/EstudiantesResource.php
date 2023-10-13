<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudiantesResource\Pages;
use App\Filament\Resources\EstudiantesResource\RelationManagers;
use App\Models\Estudiantes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstudiantesResource extends Resource
{
    protected static ?string $model = Estudiantes::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->maxLength(100)->required(),
                Forms\Components\TextInput::make('apellido')->maxLength(100)->required(),
                Forms\Components\TextInput::make('documento_identidad')->maxLength(20)->required(),
                Forms\Components\TextInput::make('correo_electronico')->email()->maxLength(100)->required(),
                Forms\Components\TextInput::make('telefono')->maxLength(10)->required(),
                Forms\Components\TextInput::make('telefono_emergencia')->maxLength(10)->required(),
                Forms\Components\Select::make('enfermedad')->options([
                    'Si' => 'Si',
                    'No' => 'No',
                ])->required(),
                Forms\Components\Select::make('tipo_pago')->options([
                    'Zelle' => 'Zelle',
                    'Transferencia Bancaria' => 'Transferencia Bancaria',
                    'Paypal' => 'Paypal',
                    'Stripe' => 'Stipe',
                ])->required(),
                Forms\Components\Select::make('kardek')->options([
                    'Si' => 'Si',
                    'No' => 'No',
                ])->required(),
                Forms\Components\Select::make('carrera')->options([
                    '1' => 'Carrera de Maquillaje',
                    '2' => 'Carrera de Peinado',
                    '3' => 'Carrera de Uñas',
                    '4' => 'Carrera de Facial',
                ])->required(),
                Forms\Components\Select::make('materia')->options([
                    '1' => 'Maquillaje 1',
                    '2' => 'Maquillaje 2',
                    '3' => 'Maquillaje 3',
                    '4' => 'Peinado 1',
                    '5' => 'Peinado 2',
                    '6' => 'Peinado 3',

                ])->required(),
                Forms\Components\Select::make('curso')->options([
                    '1' => 'Maquillaje 1',
                    '2' => 'Maquillaje 2',
                    '3' => 'Maquillaje 3',
                    '4' => 'Peinado 1',
                    '5' => 'Peinado 2',
                    '6' => 'Peinado 3',

                ])->required(),
                Forms\Components\Textarea::make('direccion')->maxLength(500)->columnSpanFull()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('apellido')->searchable(),
                Tables\Columns\TextColumn::make('documento_identidad')->searchable(),
                Tables\Columns\TextColumn::make('correo_electronico')->searchable(),
                Tables\Columns\TextColumn::make('telefono')->searchable(),
                Tables\Columns\TextColumn::make('telefono_emergencia')->searchable(),
                Tables\Columns\TextColumn::make('enfermedad')->label('Tiene una Enfermedad?'),
                Tables\Columns\TextColumn::make('tipo_pago')->searchable(),
                Tables\Columns\TextColumn::make('kardek'),
                Tables\Columns\TextColumn::make('carrera')->searchable(),
                Tables\Columns\TextColumn::make('materia')->searchable(),
                Tables\Columns\TextColumn::make('curso')->searchable(),
                Tables\Columns\TextColumn::make('direccion'),
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
            'index' => Pages\ListEstudiantes::route('/'),
            'create' => Pages\CreateEstudiantes::route('/create'),
            'edit' => Pages\EditEstudiantes::route('/{record}/edit'),
        ];
    }
}
