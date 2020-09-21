<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Order extends Model
{
    use HasFactory;

    const ASSEMBLY = 1;
    const DELIVERY = 2;
    const SUBMIT = 3;
    const COMPLETED = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cost', 'status', 'currency', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
