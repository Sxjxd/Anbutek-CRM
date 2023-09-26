<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'address',
    ];

    public static function customerData($groupByDate = false)
    {
        $query = static::selectRaw('DATE(created_at) as date, COUNT(*) as customer_count')
            ->groupBy('date')
            ->orderBy('date', 'ASC');

        if ($groupByDate) {
            return $query->get()->keyBy('date');
        }

        return $query->get();
    }

}
