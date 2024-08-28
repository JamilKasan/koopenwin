<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoEntryResource\Pages;
use App\Filament\Resources\PromoEntryResource\RelationManagers;
use App\Models\PromoEntry;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromoEntryResource extends Resource
{
    protected static ?string $model = PromoEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->searchable(['code', 'name', 'firstname']),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('firstname'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\ToggleColumn::make('valid'),
            ])
            ->filters([
                Tables\Filters\Filter::make('valid')
                    ->query(fn (Builder $query): Builder => $query->where('valid', true))
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPromoEntries::route('/'),
            'create' => Pages\CreatePromoEntry::route('/create'),
            'edit' => Pages\EditPromoEntry::route('/{record}/edit'),
        ];
    }
}
