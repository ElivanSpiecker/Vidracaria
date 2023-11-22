<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precos extends Model
{
    use HasFactory;
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedores::class, 'fornecedor_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
