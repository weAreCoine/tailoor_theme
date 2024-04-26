<?php

namespace App\Policies;

use App\Enums\IubendaConsent;
use App\Traits\Singleton;

class GDPR
{
    use Singleton;

    protected array $purposes;

    public function __construct()
    {
        if (empty($this->purposes)) {
            foreach ($_COOKIE as $name => $value) {
                $cookie = str_starts_with($name, '_iub_cs-');
                if ($cookie) {
                    $value = json_decode(stripslashes($value), true);
                    if (isset($value['purposes'])) {
                        $this->purposes = $value['purposes'];
                        break;
                    }
                }
            }
        }
    }

    public function for(IubendaConsent ...$consents): bool
    {
        foreach ($consents as $consent) {
            if ($this->getConsent($consent)) {
                return false;
            }
        }

        return true;
    }

    protected function getConsent(IubendaConsent $consent)
    {
        return $this->purposes[$consent->value] ?? false;
    }

    public function necessary(): bool
    {
        return $this->getConsent(IubendaConsent::NECESSARY);
    }

    public function functional(): bool
    {
        return $this->getConsent(IubendaConsent::FUNCTIONAL);
    }

    public function experience(): bool
    {
        return $this->getConsent(IubendaConsent::EXPERIENCE);
    }

    public function marketing(): bool
    {
        return $this->getConsent(IubendaConsent::MARKETING);
    }

    public function measurement(): bool
    {
        return $this->getConsent(IubendaConsent::MEASUREMENT);
    }

}
