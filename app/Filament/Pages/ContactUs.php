<?php

namespace App\Filament\Pages;

use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class ContactUs extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Contact-Us';

    protected static ?string $navigationGroup = 'Page Manager';

    // protected static ?int $navigationSort = 4;

    protected static string $view = 'filament.pages.contact-us';
}
