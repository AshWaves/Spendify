<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	protected $fillable = [
        'name',
    ];
	protected $table = 'categories';
    use HasFactory ,SoftDeletes;

	/**
	 * Get all of the comments for the Category
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function Products()
	{
		return $this->hasMany(Product::class, 'category_id', 'id');
	}
}
