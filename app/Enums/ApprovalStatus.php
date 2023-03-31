<?php

namespace App\Enums;

enum ApprovalStatus: string {
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Checking = 'checking';
    case Canceled = 'canceled';
    case Sealed = 'sealed';
}
