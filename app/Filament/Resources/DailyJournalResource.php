<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\SportLevel;
use App\Models\JournalPage;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DailyJournalResource\Pages;
use App\Filament\Resources\DailyJournalResource\RelationManagers;

class DailyJournalResource extends Resource
{
    protected static ?string $model = JournalPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                Select::make('sportLevelId')
                    ->label('Sport Level')
                    ->options(SportLevel::all()->pluck('tk_name', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('meal_1'),
                TextInput::make('meal_2'),
                TextInput::make('meal_3'),
                Checkbox::make('work_on_side_project')->inline(),
                Checkbox::make('video_games')->inline(),
                Checkbox::make('meditation')->inline()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDailyJournals::route('/'),
        ];
    }
}
