<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuarterResource\Pages;
use App\Filament\Resources\QuarterResource\RelationManagers;
use App\Filament\Resources\QuarterResource\RelationManagers\PharmaciesRelationManager;
use App\Models\City;
use App\Models\Quarter;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class QuarterResource extends Resource
{
    protected static ?string $model = Quarter::class;

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';
    protected static ?string $navigationGroup = 'Address management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('city_id')
                        ->label('City')
                        ->options(City::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string) ($rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * ($livewire->page - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('city.name'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\BadgeColumn::make('pharmacies_count')
                    ->color('success')
                    ->counts('pharmacies')
                    ->label('Pharmacies'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('city')->relationship('city', 'name')->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //PharmaciesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuarters::route('/'),
            'create' => Pages\CreateQuarter::route('/create'),
            'edit' => Pages\EditQuarter::route('/{record}/edit'),
            'view' => Pages\ViewQuarter::route('/{record}'),
        ];
    }
}
