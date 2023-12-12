<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'currency',
        'phone_one',
        'phone_two',
        'main_email',
        'support_email',
        'address',
        'logo',
        'favicon',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        ];
}
