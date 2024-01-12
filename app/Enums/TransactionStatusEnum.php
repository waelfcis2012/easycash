<?php

namespace App\Enums;

enum TransactionStatusEnum: Int
{
    case PAID = 1;
    case PENDING = 0;
    case FAILED = -1;
}