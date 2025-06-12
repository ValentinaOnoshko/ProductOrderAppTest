<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'price',
    ];

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    public function getCategoryId(): int
    {
        return $this->getAttribute('category_id');
    }

    public function getPrice(): float
    {
        return $this->getAttribute('price');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory(): Category
    {
        return $this->getRelationValue('category');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function formattedPrice(): string
    {
        return number_format($this->getPrice(), 2) . ' ₽';
    }
}
