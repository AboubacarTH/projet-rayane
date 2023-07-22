<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PharmacyGroupResource\Pages;
use App\Filament\Resources\PharmacyGroupResource\RelationManagers;
use App\Filament\Resources\PharmacyGroupResource\RelationManagers\GroupsRelationManager;
use App\Filament\Resources\PharmacyGroupResource\RelationManagers\PharmaciesRelationManager;
use App\Models\PharmacyGroup;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PharmacyGroupResource extends Resource
{
    protected static ?string $model = PharmacyGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';
    protected static ?string $navigationGroup = 'Pharmacy management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('pharmacy_id')
                        ->relationship('pharmacy', 'name')
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
                Tables\Columns\TextColumn::make('pharmacy.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('group.name')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pharmacy')->relationship('pharmacy', 'name')->searchable(),
                Tables\Filters\SelectFilter::make('group')->relationship('group', 'name')->searchable(),
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
            PharmaciesRelationManager::class,
            GroupsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPharmacyGroups::route('/'),
            'create' => Pages\CreatePharmacyGroup::route('/create'),
            'view' => Pages\ViewPharmacyGroup::route('/{record}'),
            'edit' => Pages\EditPharmacyGroup::route('/{record}/edit'),
        ];
    }
}
