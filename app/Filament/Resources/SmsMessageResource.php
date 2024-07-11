<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmsMessageResource\Pages;
use App\Filament\Resources\SmsMessageResource\RelationManagers;
use App\Models\SmsMessage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SmsMessageResource extends Resource
{
    protected static ?string $model = SmsMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('text')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

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
            'index' => Pages\ListSmsMessages::route('/'),
            'create' => Pages\CreateSmsMessage::route('/create'),
            'edit' => Pages\EditSmsMessage::route('/{record}/edit'),
        ];
    }
}
