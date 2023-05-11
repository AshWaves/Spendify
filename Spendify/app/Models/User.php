<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Sale;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
	protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
		'document_id',
        'name',
		'last_name',
        'email',
        'password',
		'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
		'created_at' => 'datetime:Y-m-d',
		'update_at' => 'datetime:Y-m-d',
        'email_verified_at' => 'datetime',
    ];

	/**
	 * Get all of the comments for the User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function SellerSales()
	{
		return $this->hasMany(Sale::class, 'seller_id', 'id');
	}
	public function BuyerSales()
	{
		return $this->hasMany(Sale::class, 'buyer_id', 'id');
	}

	public function Product()
	{
		return $this->hasMany(Product::class, 'seller_id', 'id');
	}
}
