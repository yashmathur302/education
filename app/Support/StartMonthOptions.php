<?php

namespace App\Support;

use Illuminate\Support\Carbon;

/**
 * The months a family can choose for "We'd like to start in...".
 * Values are stored as "YYYY-MM"; labels read like "January 2027".
 */
class StartMonthOptions
{
    private const MONTHS_AHEAD = 12;

    /**
     * @return array<string, string> value => label, starting with the current month
     */
    public static function all(): array
    {
        $options = [];
        $month = Carbon::now()->startOfMonth();

        for ($i = 0; $i < self::MONTHS_AHEAD; $i++) {
            $options[$month->format('Y-m')] = $month->format('F Y');
            $month = $month->addMonth();
        }

        return $options;
    }

    public static function label(string $value): string
    {
        return Carbon::createFromFormat('Y-m', $value)->format('F Y');
    }
}
