<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Area;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AreaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AreaResource\RelationManagers;

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'FAPs Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
                ->schema([
                    Select::make('region_id')
                    ->label('Область')
                        ->relationship('region','region')
                        ->required(),
                    TextInput::make('area')
                    ->label('Район')
                    ->placeholder('Введите район')
                    ->required()
                    
                ])
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('region.region')->sortable()->searchable(),
            TextColumn::make('area')->sortable()->searchable(),
            TextColumn::make('created_at')->dateTime()
        ])
        ->filters([
            SelectFilter::make('region')->relationship('region','region')

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
        'index' => Pages\ListAreas::route('/'),
        'create' => Pages\CreateArea::route('/create'),
        'edit' => Pages\EditArea::route('/{record}/edit'),
    ];
}
}
