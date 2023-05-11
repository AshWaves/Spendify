<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
	protected $fillable = [
		'buyer_id',
        'seller_id',
		'product_id',
        'date_sale',
    ];
	protected $table = 'sales';
    use HasFactory, SoftDeletes;

	/**
	 * Get the user that owns the Sale
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function Product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}
	public function Seller()
	{
		return $this->belongsTo(User::class, 'seller_id', 'id');
	}
	public function Buyer()
	{
		return $this->belongsTo(User::class, 'buyer_id', 'id');
	}

}
