<?php

namespace App\Filament\Resources\VentasResource\Widgets;

use App\Models\Ventas;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class VentasChart extends ChartWidget
{
    protected static ?string $heading = 'Ventas';

    public ?string $filter = 'today';

    protected function getData(): array
    {
        $data = Trend::model(Ventas::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear()
        )
        ->perMonth()
        ->count();

        
        return [
            'datasets' => [
                [
                    'label' => 'Ventas Realizadas',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hoy',
            'week' => 'Ultima semana',
            'month' => 'Mes Pasado',
            'year' => 'Este año',
        ];
    }
}
