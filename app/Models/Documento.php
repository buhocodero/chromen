<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tipo_documento','numeroDocumento','id_persona','foto'
    ];
    
    public function personas()
    {
        return $this->belongsTo(Persona::class);
    }    
    public function tipo_documentos()
    {
        return $this->belongsTo(TipoDocumento::class);
    }      
}
