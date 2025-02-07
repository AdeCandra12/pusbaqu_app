<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Wizard;
use App\Models\TranslationRegistration;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TranslationRegistrationResource\Pages;
use App\Filament\Resources\TranslationRegistrationResource\RelationManagers;

class TranslationRegistrationResource extends Resource
{
    protected static ?string $model = TranslationRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';

    protected static ?string $navigationLabel = 'Translation Registration';

    protected static ?string $pluralLabel = 'Translation Registrations';

    protected static ?string $navigationGroup = 'Translation Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Wizard::make([
                    Step::make('Translation Registration')
                        ->schema([
                            Grid::make(3)
                                ->schema([
                                    Forms\Components\Select::make('translation_category_id')
                                        ->label('translation Category')
                                        ->relationship('translationCategory', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                    Forms\Components\FileUpload::make('document_file')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->required(),
                                ]),
                        ]),

                    Step::make('Customer Information')
                        ->schema([
                            Forms\Components\Select::make('user_id')
                                ->label('Registrant')
                                ->relationship('registrant', 'email')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $user = User::find($state);

                                    $name = $user->name;
                                    $email = $user->email;
                                    $phone = $user->phone;
                                    $gender = $user->gender;
                                    $npm_nik = $user->npm_nik;
                                    $date_of_birth = $user->date_of_birth;
                                    $registrant_type = $user->registrant_type;

                                    $set('name', $name);
                                    $set('email', $email);
                                    $set('phone', $phone);
                                    $set('gender', $gender);
                                    $set('npm_nik', $npm_nik);
                                    $set('date_of_birth', $date_of_birth);
                                    $set('registrant_type', $registrant_type);
                                })
                                ->afterStateHydrated(function (callable $set, $state) {
                                    $userId = $state;
                                    if ($userId) {
                                        $user = User::find($userId);
                                        $name = $user->name;
                                        $email = $user->email;
                                        $phone = $user->phone;
                                        $gender = $user->gender;
                                        $npm_nik = $user->npm_nik;
                                        $date_of_birth = $user->date_of_birth;
                                        $registrant_type = $user->registrant_type;

                                        $set('name', $name);
                                        $set('email', $email);
                                        $set('phone', $phone);
                                        $set('gender', $gender);
                                        $set('npm_nik', $npm_nik);
                                        $set('date_of_birth', $date_of_birth);
                                        $set('registrant_type', $registrant_type);
                                    }
                                }),

                            Forms\Components\TextInput::make('name')
                                ->label('Name')
                                ->maxLength(255)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('email')
                                ->label('Email')
                                ->maxLength(255)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('phone')
                                ->label('Phone')
                                ->maxLength(255)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('gender')
                                ->label('gender')
                                ->maxLength(255)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('npm_nik')
                                ->label('NPM/NIK')
                                ->maxLength(255)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('date_of_birth')
                                ->label('date_of_birth')
                                ->maxLength(255)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('registrant_type')
                                ->label('registrant_type')
                                ->maxLength(255)
                                ->readOnly()
                                ->required(),
                        ]),

                    Step::make('Pusba Approval')
                        ->schema([
                            Forms\Components\FileUpload::make('payment_proof')
                                ->label('Proof of Payment')
                                ->image()
                                ->required(),

                            Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'pengajuan va' => 'pengajuan VA',
                                    'menunggu konfirmasi' => 'Menunggu Konfirmasi',
                                    'pembayaran berhasil' => 'pembayaran Berhasil',
                                    'pembayaran gagal' => 'pembayaran Gagal',
                                ])
                                ->required(),
                        ])
                ])

                    ->columnSpan('full')
                    ->columns(1)
                    ->skippable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('translationCategory.name')
                    ->label('Translation Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registrant.name')
                    ->label('Registrant')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registrant.npm_nik')
                    ->label('NPM/NIK')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
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
            'index' => Pages\ListTranslationRegistrations::route('/'),
            'create' => Pages\CreateTranslationRegistration::route('/create'),
            'edit' => Pages\EditTranslationRegistration::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
