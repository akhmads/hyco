<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $color = 'text-white',
        public ?string $icon = null,
        public ?string $spinner = null
    ) {}

    /**
     * Get the color theme.
     */
    public function colorTheme(): ?string
    {
        switch ($this->color) {
            case 'primary' : $color = 'text-white bg-blue-500 hover:bg-blue-400'; break;
            case 'light' : $color = 'text-white bg-blue-500 hover:bg-blue-400'; break;
            default : $color = 'text-white bg-blue-500 hover:bg-blue-400'; break;
        }

        return $color;
    }

    /**
     * Get the model name.
     */
    public function modelName(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }

    /**
     * Get the spinner target.
     */
    public function spinnerTarget(): ?string
    {
        if ($this->spinner == 1) {
            return $this->attributes->whereStartsWith('wire:click')->first();
        }

        return $this->spinner;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
            <button {{ $attributes->merge(['wire:loading.attr' => 'disabled', 'type' => 'submit', 'class' => $colorTheme() . ' inline-flex items-center justify-center gap-2 disabled:opacity-75 delay-50 duration-300 ease-in-out rounded-md px-4 py-2 tracking-widest text-base focus:outline-none focus:ring-0']) }}>

            <!-- SPINNER -->
            @if($spinner)
            <svg wire:loading wire:target="{{ $spinnerTarget() }}" class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            @endif

            <!-- ICON -->
            @unless(empty($icon))
            <span class="block" @if($spinner) wire:loading.class="hidden" wire:target="{{ $spinnerTarget() }}" @endif>
            <x-svg :name="'heroicon-'.$icon" class="inline w-4 h-4" />
            </span>
            @endunless

            {{ $slot }}

            </button>
        HTML;
    }
}
