<?php

namespace App\Enums;

enum UserStatus: string {
    case Active = 'active';
    case Inactive = 'inactive';

    // public function word(): string
    // {
	// 	return str($this->name)->replace('_', ' ')->title()->__toString();
    // }

}

// $rs = RoomStatus::Tidak_Aktif;
// $rs->word();
