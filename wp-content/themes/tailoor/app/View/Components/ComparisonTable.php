<?php

namespace App\View\Components;

use App\Models\PricePlan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ComparisonTable extends Component
{
    public Collection $plans;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->plans = collect(PricePlan::getPlans()->reduce(function ($carry, $plan) {
            foreach ($plan as $section => $plansData) {
                foreach ($plansData as $feature => $value) {
                    $carry[$section][$feature][] = $value;
                }
            }
            return $carry;
        }, []));
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (current_user_can('administrator')) {
            return view('components.comparison-table');
        }
        return '';
    }
}
