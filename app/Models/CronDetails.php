<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CronDetails extends Model
{
    use HasFactory;

    protected $table = 'nvd_cron_details';

    /**
     * Get the user's first name.
     */
    // protected function firstName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucfirst($value),
    //     );
    // }
}
