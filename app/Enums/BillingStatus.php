<?php

namespace App\Enums;

enum ApprovalStatus: string {
    case Paid = 'paid';
    case Unpaid = 'unpaid';
    case Checking = 'checking';
    case Expired = 'expired';
    case Canceled = 'canceled';
}
