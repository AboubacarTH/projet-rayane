<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PharmacyResource\Pages;
use App\Filament\Resources\PharmacyResource\RelationManagers;
use App\Models\City;
use App\Models\Pharmacy;
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

class PharmacyResource extends Resource
{
    protected static ?string $model = Pharmacy::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'Pharmacy management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\FileUpload::make('avatar')
                        ->label('Image')
                        ->image()
                        ->directory('pharmacy-avatars')
                        ->maxSize(1024),
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
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                        ->tel()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('description')
                        ->fileAttachmentsDisk('s3')
                        ->fileAttachmentsDirectory('pharmacy-attachments')
                        ->fileAttachmentsVisibility('private'),
                    Forms\Components\TextInput::make('geolocation')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('status')
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
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular()
                    ->size(40),
                Tables\Columns\TextColumn::make('city.name')->sortable(),
                Tables\Columns\TextColumn::make('quarter.name')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('city')->relationship('city', 'name')->searchable(),
                Tables\Filters\SelectFilter::make('quarter')->relationship('quarter', 'name')->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPharmacies::route('/'),
            'create' => Pages\CreatePharmacy::route('/create'),
            'edit' => Pages\EditPharmacy::route('/{record}/edit'),
            'view' => Pages\ViewPharmacy::route('/{record}'),
        ];
    }
}
