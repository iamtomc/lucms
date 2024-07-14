<?php

namespace App\Filament\Pages;

use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class Home extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Home';

    protected static ?string $navigationGroup = 'Page Manager';

    // protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.home';
}
