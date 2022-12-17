<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video_Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_id','categoria_id'
    ];
    public function videos()
    {
        return $this->belongsTo(Video::class);//recibe de videos
    }    
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);//recibe de videos
    }    
}
