<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $label = null,
        public Collection|array $options = [],
        public ?string $value = null,
        public ?string $placeholder = "-- Select --",
        public ?string $wrap = "mb-3",
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
            <div class="{{ $wrap }}">
                <!-- LABEL -->
                @unless(empty($label))
                <x-hc-input-label :value="$label" class="mb-1"></x-hc-input-label>
                @endunless

                <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm disabled:bg-slate-100']) !!}>

                    @unless(empty($placeholder))
                    <option value="">
                        {{ $placeholder }}
                    </option>
                    @endunless

                    @if(isset($slot))
                    {{ $slot }}
                    @endif

                    @foreach ($options as $option_value => $option_label)
                    <option value="{{ $option_value }}" {{ ($option_value==$value) ? 'selected' : '' }}>
                        {{ $option_label }}
                    </option>
                    @endforeach

                </select>

                <!-- ERROR -->
                <x-hc-input-error :messages="$errors->get($modelName())" class="mt-1"></x-hc-input-error>
            </div>
        HTML;
    }
}
