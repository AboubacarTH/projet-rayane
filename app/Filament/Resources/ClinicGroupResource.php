<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClinicGroupResource\Pages;
use App\Filament\Resources\ClinicGroupResource\RelationManagers;
use App\Models\City;
use App\Models\Clinic;
use App\Models\ClinicGroup;
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

class ClinicGroupResource extends Resource
{
    protected static ?string $model = ClinicGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';
    protected static ?string $navigationGroup = 'Clinic management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('city_id')
                        ->relationship('city', 'name')
                        ->reactive()
                        ->required(),
                    Forms\Components\Select::make('quarter_id')
                        ->label('Quarter')
                        ->options(function (callable $get) {
                            $city = City::find($get('city_id'));
                            if (!$city) {
                                return [];
                            }
                            return $city->quarters->pluck('name', 'id');
                        })
                        ->reactive()
                        ->required(),
                    Forms\Components\Select::make('clinic_id')
                        ->label('Clinic')
                        ->options(function (callable $get) {
                            $quarter = Quarter::find($get('quarter_id'));
                            if (!$quarter) {
                                return [];
                            }
                            return $quarter->clinics->pluck('name', 'id');
                        })
                        ->required(),
                    Forms\Components\Select::make('group_id')
                        ->relationship('group', 'name')
                        ->required(),
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
                Tables\Columns\TextColumn::make('clinic.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('group.name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //Tables\Filters\SelectFilter::make('quater')->relationship('quater', 'name')->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListClinicGroups::route('/'),
            'create' => Pages\CreateClinicGroup::route('/create'),
            'view' => Pages\ViewClinicGroup::route('/{record}'),
            'edit' => Pages\EditClinicGroup::route('/{record}/edit'),
        ];
    }
}
