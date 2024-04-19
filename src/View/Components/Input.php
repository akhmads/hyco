<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $label = null,
        public ?string $disabled = null
    ) {}

    /**
     * Get the model name.
     */
    public function modelName(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
            <!-- LABEL -->
            @unless(empty($label))
            <x-hc-input-label :value="$label" class="mb-1"></x-hc-input-label>
            @endunless

            <!-- INPUT -->
            <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>

            <!-- ERROR -->
            <x-hc-input-error :messages="$errors->get($modelName())" class="mt-1"></x-hc-input-error>
        HTML;
    }
}
