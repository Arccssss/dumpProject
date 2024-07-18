<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class userDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $users = User::get();
        $tasks = Task::get();

        return [

            
            Stat::make('Open Tasks', $tasks->where('status_id', 1)->count()),
            
        ];
    }

    public static function canView(): bool
    {
        return !(auth()->user()->is_admin);
    }

}
