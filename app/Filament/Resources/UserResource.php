<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Columns\TextInputColumn;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Area;
use App\Models\Fap;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Users Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('surname')
                    ->required()
                    ->label('Фамилия')
                    ->maxLength(255),
                    
                    TextInput::make('name')
                    ->required()
                    ->label('Имя')
                    ->maxLength(255),
                    TextInput::make('patronymic')
                    ->required()
                    ->label('Отчество')
                    ->maxLength(255),
                    TextInput::make('email')
                    ->required()
                    ->label('Email почта')
                    ->maxLength(255),
                    TextInput::make('password')
                    ->password()
                    ->required(fn(Page $livewire):bool=> $livewire instanceof CreateRecord)
                    ->label('Пароль')
                    ->minLength(8)
                    ->same('passwordConfirmation')
                    ->dehydrated(fn($state)=> filled($state))
                    ->dehydrateStateUsing(fn($state)=>Hash::make($state)),
                    TextInput::make('passwordConfirmation')
                    ->password()
                    ->required(fn(Page $livewire):bool=>$livewire instanceof CreateRecord)
                    ->label('Подтверждение пароля')
                    ->minLength(8)
                    ->dehydrated(false),
                    Select::make('fap_id')
                ->required()
                ->label('ФАП')
                ->options(Fap::all()->pluck('number','id')->toArray())
                ->reactive()

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('email')->sortable()->searchable(),
            TextColumn::make('userType')->sortable()->searchable(),
            TextColumn::make('fap.number')->sortable()->searchable(),
            TextColumn::make('created_at')->dateTime()


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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

        public static function singularLabel()
    {
        return __('Translated Resource Name');
    }

}
