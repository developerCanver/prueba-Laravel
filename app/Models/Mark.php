<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id'
    ];

    public static function search($search){
        return empty($search) ? static::query()
        :static::where('id','like', '%'.$search.'%')
        ->orwhere('name','like', '%'.$search.'%');
    }
}
