<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Livewire\Component;

class CreateProduct extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),
            Textarea::make('description')->required(),
            Select::make('category_id')
                ->label('Category')
                ->options(ProductCategory::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
            TextInput::make('manufacturer')->required(),
            FileUpload::make('photo')
                ->image()
                ->directory('products')
                ->moveFiles()
                ->required(),
        ])->statePath('data');
    }

    public function create(): void
    {
        $fileName = basename(Arr::first($this->data['photo'])->store('products'));
        Product::create([
            'name' => $this->data['name'],
            'description' => $this->data['description'],
            'category_id' => $this->data['category_id'],
            'manufacturer' => $this->data['manufacturer'],
            'photo' => $fileName,
        ]);
    }

    public function render()
    {
        return view('products.create-product');
    }
}
