<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputLabel extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $value = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
            <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
                {{ __($value ?? $slot) }}
            </label>
        HTML;
    }
}
