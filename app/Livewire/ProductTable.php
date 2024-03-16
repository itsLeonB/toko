<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;
    public $creatingProduct = false;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setReorderStatus(false);
        $this->setEagerLoadAllRelationsStatus(true);
        $this->setLoadingPlaceholderStatus(true);
        $this->setConfigurableAreas([
            'toolbar-left-start' => 'products.create-button',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Description", "description")
                ->sortable()->searchable(),
            Column::make("Category", "category.name")
                ->sortable()->searchable(),
            Column::make("Manufacturer", "manufacturer")
                ->sortable()->searchable(),
        ];
    }

    public function filters(): array
    {
        return [
            MultiSelectFilter::make('Category')
                ->options(
                    ProductCategory::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn ($category) => $category->name)
                        ->toArray()
                )->filter(function (Builder $builder, array $value) {
                    foreach ($value as $key => $val) {
                        $builder->orWhere('category_id', $val);
                    }
                }),
        ];
    }

    public function createProduct()
    {
        return redirect()->route('products.create');
    }
}
