<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    use HasFactory;
    protected $table = 'models';

    protected $fillable = [
        'name', 'mark_id'
    ];

    public static function search($search){
        return empty($search) ? static::query()
        :static::where('models.id','like', '%'.$search.'%')
        ->orwhere('models.name','like', '%'.$search.'%');
    }
    
}
