<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $data = null
    ) {}

    /**
     * Get the color theme.
     */
    public function colorTheme(): ?string
    {
        switch (session('toast_type')) {
            case 'primary' : $color = 'text-blue-50 bg-blue-700 border border-blue-800'; break;
            case 'success' : $color = 'text-green-50 bg-green-700 border border-green-800'; break;
            case 'danger' : $color = 'text-red-50 bg-red-700 border border-red-800'; break;
            case 'warning' : $color = 'text-yellow-50 bg-yellow-700 border border-yellow-800'; break;
            default : $color = 'text-gray-50 bg-gray-700 border border-gray-800'; break;
        }

        return $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
        @if(session()->has('toast_message'))
        <div onclick="this.remove()" x-init="setTimeout(() => $el.remove(), 50000)" class="{{ $colorTheme() }} w-72 cursor-pointer fixed top-5 right-5 z-[9999] inline-flex item-center justify-between text-base px-5 py-4 rounded shadow-lg">
            <div class="grow">
                <!-- <div class="f-full font-semibold mb-2">{{ __('Success') }}</div> -->
                <div>{{ session('toast_message') }}</div>
            </div>
            <button type="button" class="" onclick="this.parentNode.remove()" class="shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 ml-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif
        HTML;
    }
}
