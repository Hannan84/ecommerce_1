<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','subcategory_name', 'subcategory_slug'];

    // join with category model 
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
