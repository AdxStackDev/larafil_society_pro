<?php

namespace App\Filament\Resources\Visitors\Widgets;

use Filament\Widgets\ChartWidget;

class Visitors extends ChartWidget
{
    protected ?string $heading = 'Visitors';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Visitors Count',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
