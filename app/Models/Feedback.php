<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 * @method static where(string $string, string $string1)
 */
class Feedback extends Model
{
    use HasFactory;


    protected $table = 'feedback';

    protected $fillable = [
        'category',
        'name',
        'email',
        'message',
        'status',
    ];
}
