<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;

class Article extends Model
{
    use HasFactory, Sluggable;
  

    protected $fillable = [
        'title', 'annotation', 'journal_name','pub_date','file_url'
    ];

    
    public function users()
    {

        return $this->belongsToMany(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function manageFile(Request $request, $file = null){
        if($request->hasFile('file_url')){
                
        }
        
    }


}
