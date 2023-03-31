<?php

namespace App\Enums;

enum RoomStatus: string {
    case Active = 'active';
    case Inactive = 'inactive';
    case Rented = 'rented';
    case Booked = 'booked';
    case Sealed = 'sealed';
}
