<?php

namespace App\Abstracts;

use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class Carousel extends Component
{
    public Collection $filenames;

    public string $imagesFolderPath;

    public bool $hasLinks = false;

    public bool $background = false;

    public bool $pauseOnHover = false;

    /**
     * Create a new component instance.
     *
     * @throws Exception
     */
    public function __construct(public bool $addPadding = true)
    {
        $this->sanitizeImagesFolderPath();
        $this->filenames = collect(scandir(resource_path($this->imagesFolderPath)));
        while ($this->filenames->count() < 20) {
            $this->filenames = $this->filenames->merge($this->filenames);
        }
    }

    /**
     * @throws Exception
     */
    protected function sanitizeImagesFolderPath(): void
    {
        $this->imagesFolderPath = trim($this->imagesFolderPath);
        if (empty($this->imagesFolderPath)) {
            throw new Exception('Please specify an images folder to generate Carousel');
        }
        if (Str::endsWith($this->imagesFolderPath, '/')) {
            $this->imagesFolderPath = substr($this->imagesFolderPath, 0, -1);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel');
    }
}
