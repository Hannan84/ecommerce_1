<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
class Childcategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','subcategory_id','childcategory_name', 'childcategory_slug'];

    // join with category model 
    public function category(){
        return $this->belongsTo(Category::class);
    }
    // join with subcategory model 
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
