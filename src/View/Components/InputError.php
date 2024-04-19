<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputError extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?array $messages = []
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
            @if (count((array) $messages) > 0)
                <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
                    @foreach ((array) $messages as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        HTML;
    }
}
