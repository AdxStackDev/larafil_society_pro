<?php

namespace App\Filament\Resources\Visitors\Widgets;

use Filament\Widgets\ChartWidget;

//to add data from model
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Visitors As Guest;

// to add filter
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;
use Illuminate\Support\Carbon;

class Visitors extends ChartWidget
{
    use HasFiltersSchema;

    protected ?string $heading = 'Visitors';

    public function filtersSchema(Schema $schema): Schema
    {
        return $schema->components([
            DatePicker::make('startDate')->default(now()->subDays(30)),
            DatePicker::make('endDate')->default(now()),
        ]);
    }

    protected function getData(): array
    {
        $rawStart = $this->filters['startDate'] ?? null;
        $rawEnd = $this->filters['endDate'] ?? null;

        $startDate = !empty($rawStart) ? Carbon::parse($rawStart)->startOfDay() : now()->subDays(30)->startOfDay();

        $endDate = !empty($rawEnd) ? Carbon::parse($rawEnd)->endOfDay() : now()->endOfDay();

        $data = Trend::model(Guest::class)->dateColumn('arrival')
            ->between(
                start: $startDate,
                end: $endDate,
            )->perMonth()->count();

        return [
            'datasets' => [
                [
                    'label' => 'Visitors Count',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('M Y'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
