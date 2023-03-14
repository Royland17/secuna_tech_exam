<?php

namespace App\Enums;

enum BugReportSeverity : string
{
    
    case CRITICAL = "Critical";
    case HIGH = "High";
    case MEDIUM = "Medium";
    case LOW = "Low";
    case NONE = "None";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
