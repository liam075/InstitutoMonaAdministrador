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
                Forms\Components\TextInput::make('nombre')->label('Nombres')->maxLength(100)->required(),
                Forms\Components\TextInput::make('apellido')->label('Apellidos')->maxLength(100)->required(),
                Forms\Components\TextInput::make('documento_identidad')->label('Documento de Identidad')->maxLength(20)->required(),
                Forms\Components\DatePicker::make('fecha_nacimiento')->maxDate(now())->required(),
                Forms\Components\TextInput::make('correo_electronico')->email()->maxLength(100)->required(),
                Forms\Components\TextInput::make('telefono')->maxLength(10)->required(),
                Forms\Components\TextInput::make('telefono_emergencia')->maxLength(10)->required(),
                Forms\Components\Select::make('enfermedad')->label('Tiene una Enfermedad?')->options([
                    'Si' => 'Si',
                    'No' => 'No',
                ])->searchable()->preload()->required(),
                Forms\Components\Select::make('tipo_pago')->label('Tipo de Pago')->options([
                    'Zelle' => 'Zelle',
                    'Transferencia Bancaria' => 'Transferencia Bancaria',
                    'Paypal' => 'Paypal',
                    'Stripe' => 'Stipe',
                ])->searchable()->preload()->required(),
                Forms\Components\Select::make('kardek')->options([
                    'Si' => 'Si',
                    'No' => 'No',
                ])->searchable()->preload()->required(),
                Forms\Components\Select::make('carreras_id')->label('Carreras')->relationship('carreras','nombre')->searchable()->preload()->columnSpanFull()->required(),
                Forms\Components\Select::make('materias_id')->label('Materias')->relationship('materias','nombre')->searchable()->preload()->columnSpanFull()->required(),
                Forms\Components\Select::make('cursos_id')->label('Cursos')->relationship('cursos','titulo')->searchable()->preload()->columnSpanFull()->required(),
                Forms\Components\Textarea::make('direccion')->maxLength(500)->columnSpanFull()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('apellido')->searchable(),
                Tables\Columns\TextColumn::make('documento_identidad')->label('Documento de Identidad')->searchable(),
                Tables\Columns\TextColumn::make('correo_electronico')->searchable(),
                Tables\Columns\TextColumn::make('telefono')->searchable(),
                Tables\Columns\TextColumn::make('telefono_emergencia')->searchable(),
                Tables\Columns\TextColumn::make('enfermedad')->label('Tiene una Enfermedad?'),
                Tables\Columns\TextColumn::make('tipo_pago')->searchable(),
                Tables\Columns\TextColumn::make('kardek'),
                Tables\Columns\TextColumn::make('carreras.nombre')->label('Carreras')->searchable(),
                Tables\Columns\TextColumn::make('materias.nombre')->label('Materias')->searchable(),
                Tables\Columns\TextColumn::make('cursos.titulo')->label('Cursos')->searchable(),
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
