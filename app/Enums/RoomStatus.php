<?php

namespace App\Enums;

enum RoomStatus: string {
    case Active = 'active';
    case Inactive = 'inactive';
    case Rented = 'rented';
    case Booked = 'booked';
    case Sealed = 'sealed';

    // public function word(): string
    // {
	// 	return str($this->name)->replace('_', ' ')->title()->__toString();
    // }

}

// $rs = RoomStatus::Tidak_Aktif;
// $rs->word();
