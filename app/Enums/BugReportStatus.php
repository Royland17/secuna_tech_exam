<?php

namespace App\Enums;

enum BugReportStatus : string
{
    case NEW = "New";
    case RESOLVED = "Resolved";
    
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}