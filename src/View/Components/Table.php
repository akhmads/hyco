<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $header = null,
        public mixed $left = null,
        public mixed $right = null,
        public mixed $footer = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
        <div {{ $attributes->merge(['class' => 'space-y-6 text-sm']) }}>
            <div class="flex flex-row items-start justify-between gap-5">
                @isset($left)
                <div {{ $left->attributes->merge(['class' => 'grid grid-cols-12 gap-2 grow' ]) }}>
                    {{ $left }}
                </div>
                @endisset

                @isset($right)
                <div {{ $right->attributes->merge(['class' => 'flex flex-row justify-end shrink-0' ]) }}>
                    {{ $right }}
                </div>
                @endisset
            </div>

            <div class="max-w-full bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-gray-700 overflow-x-auto overflow-y-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-slate-800">

                    {{ $header ?? '' }}

                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                    {{ $slot }}

                    </tbody>
                </table>
            </div>

            {{ $footer ?? '' }}
        </div>
        HTML;
    }
}
