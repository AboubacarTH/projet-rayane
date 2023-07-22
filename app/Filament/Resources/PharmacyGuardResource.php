<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PharmacyGuardResource\Pages;
use App\Filament\Resources\PharmacyGuardResource\RelationManagers;
use App\Models\PharmacyGuard;
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

class PharmacyGuardResource extends Resource
{
    protected static ?string $model = PharmacyGuard::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Pharmacy management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('group_id')
                        ->label('Groupe')
                        ->relationship('group', 'name')
                        ->required(),
                    Forms\Components\DatePicker::make('start_date'),
                    Forms\Components\DatePicker::make('end_date'),
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
                Tables\Columns\TextColumn::make('group.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('start_date')
                    ->color('success')
                    ->date(),
                Tables\Columns\BadgeColumn::make('end_date')
                    ->color('danger')
                    ->date(),
                Tables\Columns\IconColumn::make('group.status')
                    ->boolean(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPharmacyGuards::route('/'),
            'create' => Pages\CreatePharmacyGuard::route('/create'),
            'view' => Pages\ViewPharmacyGuard::route('/{record}'),
            'edit' => Pages\EditPharmacyGuard::route('/{record}/edit'),
        ];
    }
}
