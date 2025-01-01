<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class roomPromotionPackage extends Model
{
    use HasFactory ,AsSource ,Searchable ,Filterable ,Attachable;

    
    
    protected $fillable = [
        'id' ,
        'name' ,
        'pric' ,
        'discount', 
        'status' ,
        'description', 
        'image' ,
        'start_date', 
        'end_date' ,
        'seo_meta_title', 
        'seo_meta_description' ,
        'seo_url' ,
        'created_at',  
        'updateed_at', 
    ];
 

}
