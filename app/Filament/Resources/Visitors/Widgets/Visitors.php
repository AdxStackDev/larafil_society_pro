<?php

namespace App\Filament\Resources\Visitors\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Visitors As Guest;

class Visitors extends ChartWidget
{
    protected ?string $heading = 'Visitors';

    protected function getData(): array
    {
        $data = Trend::model(Guest::class)
            ->dateColumn('arrival')
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Visitors Count',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => \Carbon\Carbon::parse($value->date)->format('M Y')),
        ];            

    }

    protected function getType(): string
    {
        return 'bar';
    }
}
