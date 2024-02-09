<div>
    <form wire:submit="create">
        {{ $this->form }}
        
        <button type="submit" class="bg-primary-600 text-white rounded-circle py-2 px-3 rounded-lg" style="margin-top: 15px;">
            Submit
        </button>
        
    </form>
    <x-filament-actions::modals />
</div>
