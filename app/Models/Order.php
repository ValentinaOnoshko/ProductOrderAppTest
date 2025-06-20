<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'order_date',
        'status',
        'comment',
        'product_id',
        'quantity',
    ];

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function getCustomerName(): string
    {
        return $this->getAttribute('customer_name');
    }

    public function getOrderDate(): string
    {
        return $this->getAttribute('order_date');
    }

    public function getFormattedOrderDate(): string
    {
        return Carbon::createFromFormat('Y-m-d', $this->getOrderDate())->format('d.m.Y');
    }

    public function getStatus(): string
    {
        return $this->getAttribute('status');
    }

    public function getComment(): ?string
    {
        return $this->getAttribute('comment');
    }

    public function getQuantity(): int
    {
        return $this->getAttribute('quantity');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->getRelationValue('product');
    }

    public function total(): float
    {
        $product = $this->getProduct();
        return $product->getPrice() * $this->getQuantity();
    }

    public function formattedTotal(): string
    {
        return number_format($this->total(), 2) . ' ₽';
    }
}
