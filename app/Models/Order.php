<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 */
class Order extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public static function totalRevenue()
    {
        return static::where('status', 'Delivered')->sum('total_price');
    }

    public static function revenueData($groupByDate = false)
    {
        $query = static::selectRaw('DATE(created_at) as date, sum(total_price) as total_price')
            ->where('status', 'Delivered')
            ->groupBy('date')
            ->orderBy('date', 'ASC');

        if ($groupByDate) {
            return $query->get()->keyBy('date');
        }

        return $query->get();
    }






}
