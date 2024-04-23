<?php

namespace Akhmads\Hyco\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHead extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $name = null,
        public mixed $label = null,
        public mixed $sort = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
        <th {!! $attributes->has('wire:click') ? '' : 'wire:click="sortOrder(\''.$name.'\')"' !!} {!! $attributes->merge(['class' => 'px-4 py-2 cursor-pointer hover:bg-gray-200 delay-50 duration-300 ease-in-out']) !!}>
            <div class="flex items-center gap-2">

                {!! Illuminate\Support\Str::of($label ?? $name)->replace(['-','_'],' ')->title() !!}

                @if(isset($sort[$name]) AND $sort[$name] == 'asc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 ml-1"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                @endif

                @if(isset($sort[$name]) AND $sort[$name] == 'desc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 ml-1"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                @endif

            </div>
        </th>
        HTML;
    }
}
