<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CodeRangeResource\Pages;
use App\Filament\Resources\CodeRangeResource\RelationManagers;
use App\Models\CodeRange;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CodeRangeResource extends Resource
{
    protected static ?string $model = CodeRange::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('start'),
                Forms\Components\TextInput::make('end'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextInputColumn::make('start'),
                Tables\Columns\TextInputColumn::make('end'),
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
            'index' => Pages\ListCodeRanges::route('/'),
            'create' => Pages\CreateCodeRange::route('/create'),
            'edit' => Pages\EditCodeRange::route('/{record}/edit'),
        ];
    }
}
