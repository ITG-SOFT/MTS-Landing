<?php

namespace App\Models;

use App\Http\Requests\AttributeRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
    ];

    protected $casts = [
        'category_id' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public static function createAttribute(AttributeRequest $request, Category $category)
    {
        $data = $request->validated();

        return $category->attributes()->create($data);
    }

    public static function updateAttribute(AttributeRequest $request, self $attribute)
    {
        $data = $request->validated();

        return $attribute->update($data);
    }

    public static function deleteAttribute(self $attribute)
    {
        return $attribute->delete();
    }

    public function __toString()
    {
        return $this->title;
    }
}
