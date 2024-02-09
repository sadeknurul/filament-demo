<?php

namespace App\Livewire;

use App\Models\Support;
use Filament\Notifications\Notification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LivewireSupport extends Component implements HasForms
{
    use InteractsWithForms;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('subject')->columnSpan('full')->required(),
                MarkdownEditor::make('details')
                    ->columnSpan('full'),
            ])
            ->statePath('data');
    }

    public function render()
    {
        return view('livewire.livewire-support');
    }

    public function create()
    {
        $support = new Support;
        $support->name = $this->data['name'];
        $support->email = $this->data['email'];
        $support->subject = $this->data['subject'];
        $support->details = $this->data['details'];
        $support->save();
        Notification::make()
            ->title('The support request has been sent.')
            ->success()
            ->send();
        $this->reset(); 
    }
}
