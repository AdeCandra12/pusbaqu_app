<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TestRegistration;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Wizard;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestRegistrationResource\Pages;
use App\Filament\Resources\TestRegistrationResource\RelationManagers;

class TestRegistrationResource extends Resource
{
    protected static ?string $model = TestRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Test Registration';

    protected static ?string $navigationGroup = 'Test Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Wizard::make([
                    Step::make('Registration')
                        ->schema([
                            Grid::make(3)
                                ->schema([
                                    Forms\Components\Select::make('test_category_id')
                                        ->label('Test Category')
                                        ->relationship('testCategory', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                    Forms\Components\Select::make('study_program_id')
                                        ->label('study program')
                                        ->relationship('studyProgram', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                    Forms\Components\Select::make('schedule_id')
                                        ->label('schedule')
                                        ->relationship('schedule', 'test_date')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                    Forms\Components\TextInput::make('purpose')
                                        ->label('Purpose')
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
                                ->label('npm_nik')
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
                                    'menunggu pembayaran' => 'Menunggu Pembayaran',
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
                Tables\Columns\TextColumn::make('index')
                    ->label('No') // Menampilkan nomor urut
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('registrant.email')
                    ->label('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registrant.name')
                    ->label('Registrant')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registrant.phone')
                    ->label('Phone Number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registrant.npm_nik')
                    ->label('NPM/NIK')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registrant.registrant_type')
                    ->label('Registrant Type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('testCategory.name')
                    ->label('Test Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('studyProgram.name')
                    ->label('Study Program')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('schedule.test_date')
                    ->label('Schedule')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('purpose')
                    ->label('Purpose')
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTestRegistrations::route('/'),
            'create' => Pages\CreateTestRegistration::route('/create'),
            'edit' => Pages\EditTestRegistration::route('/{record}/edit'),
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
