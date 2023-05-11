<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	protected $table = 'products';
	protected $fillable = [
		'category_id',
        'seller_id',
		'name',
        'price',
        'stock',
		'status',
		'description'
    ];
	/**
	 * Get the user that owns the Product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function Category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

    use HasFactory, SoftDeletes;
	/**
	 * Get all of the comments for the Product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function Sales()
	{
		return $this->hasMany(Sale::class, 'product_id', 'id');
	}
	public function Sellers()
	{
		return $this->hasMany(User::class, 'seller_id', 'id');
	}

}
