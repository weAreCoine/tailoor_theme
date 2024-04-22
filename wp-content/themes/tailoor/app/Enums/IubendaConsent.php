<?php

namespace App\Enums;

enum IubendaConsent: int
{
    case NECESSARY = 1;
    case FUNCTIONAL = 2;
    case EXPERIENCE = 3;
    case MEASUREMENT = 4;
    case MARKETING = 5;
}
