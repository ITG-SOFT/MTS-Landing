<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'attribute_id',
        'product_id',
    ];

    protected $casts = [
        'attribute_id' => 'integer',
        'product_id' => 'integer',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function __toString()
    {
        return $this->value;
    }
}
