<?php

namespace App\Filament\Pages;

use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class Portfolio extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Portfolio';

    protected static ?string $navigationGroup = 'Page Manager';

    // protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.portfolio';
}
