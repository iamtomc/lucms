<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class AboutUs extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $blocks = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'About-Us';

    protected static ?string $navigationGroup = 'Page Manager';

    // protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.about-us';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(3)
                    ->schema([
                        Section::make()
                            ->columnSpan(2)
                            ->schema([
                                Forms\Components\TextInput::make('sections'),
                                Forms\Components\Repeater::make('blocks')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->live(onBlur: true),
                                        Forms\Components\Select::make('role')
                                            ->options([
                                                'member' => 'Member',
                                            ])
                                            ->required(),
                                    ])
                                    ->columns(2)
                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                            ]),
                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('layout')
                                    ->label('Layout')
                                    ->options(self::getLayoutOptions()),
                                Forms\Components\FileUpload::make('meta_image')
                                    ->image(),
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('meta_keywords'),
                                Forms\Components\Textarea::make('meta_description')
                                    ->maxLength(255),
                            ])->columnSpan(1),
                    ]),
            ]);

        }

        private static function getLayoutOptions(): array
        {
            $layouts = [];
            $files = glob(resource_path('filament/layouts/*.blade.php'));

            foreach ($files as $file) {
                $name = basename($file, '.blade.php');
                $layouts[$name] = $name;
            }

            return $layouts;
        }

        protected function getFormActions(): array
        {
            return [
                Action::make('save')
                    ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                    ->submit('save'),
            ];
        }


        public function save(): void
            {
                try {
                    $data = $this->form->getState();

                    // $this->user->pages()->updateOrCreate(
                    //     // ['type' => PageType::RESUME],
                    //     // ['data' => $data]
                    // );
                } catch (Halt $exception) {
                    return;
                }

                Notification::make()
                    ->success()
                    ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
                    ->send();
            }



}
