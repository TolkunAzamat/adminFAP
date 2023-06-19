<?php

namespace App\Filament\Resources;

use App\Models\Fap;
use Filament\Forms;
use App\Models\Area;
use Filament\Tables;
use App\Models\Region;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FapResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FapResource\RelationManagers;
use App\Filament\Resources\FapResource\Widgets\FapStateOverview;

class FapResource extends Resource
{
    protected static ?string $model = Fap::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'FAPs Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
            ->schema([
                Select::make('region_id')
                ->required()
                ->label('Область')
                ->options(Region::all()->pluck('region','id')->toArray())
                ->reactive()
                ->afterStateUpdated(fn(callable $set)=>$set('area_id',null)),
                Select::make('area_id')
                ->required()
                ->label('Район')
                ->options(function(callable $get){
                    $region=Region::find($get('region_id'));
                    if(!$region){
                        return Area::all()->pluck('area','id');
                    }
                    return $region->area->pluck('area','id');
                })
                ->reactive()
                ->afterStateUpdated(fn(callable $set)=>$set('fap_id',null)),

                TextInput::make('village')
                ->label('Село')
                ->required(),
                TextInput::make('number')
                ->label('Номер ФАПа')
                ->required()

            ])
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('region.region')->sortable()->searchable(),
            TextColumn::make('area.area')->sortable()->searchable(),
            TextColumn::make('village')->sortable()->searchable(),
            TextColumn::make('number')->sortable()->searchable()
        ])
        ->filters([
            SelectFilter::make('region')->relationship('region','region'),
            SelectFilter::make('area')->relationship('area','area')
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

// public static function getWidgets(): array
// {
//     return[
//         FapStateOverview::class,
//     ];
// }

public static function getPages(): array
{
    return [
        'index' => Pages\ListFaps::route('/'),
        'create' => Pages\CreateFap::route('/create'),
        'edit' => Pages\EditFap::route('/{record}/edit'),
    ];
}
}
