<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialStatusResource\Pages;
use App\Filament\Resources\SocialStatusResource\RelationManagers;
use App\Models\SocialStatus;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialStatusResource extends Resource
{
    protected static ?string $model = SocialStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')->required()->label('Код статуса'),
                TextInput::make('statusName')->label('Статус')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->searchable()->sortable(),
                TextColumn::make('statusName')->searchable()->sortable()
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
            'index' => Pages\ListSocialStatuses::route('/'),
            'create' => Pages\CreateSocialStatus::route('/create'),
            'edit' => Pages\EditSocialStatus::route('/{record}/edit'),
        ];
    }
}
