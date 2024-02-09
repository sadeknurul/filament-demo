<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class LivewireSupport extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.livewire-support';
}
