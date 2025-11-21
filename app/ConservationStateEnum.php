<?php

namespace App;

enum ConservationStateEnum: string
{
    case GOOD = 'good';
    case REGULAR = 'regular';
    case BAD = 'bad';
}
