<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Si la tabla tiene un nombre diferente diferente al  controlador para usar el nombre de tabla
    protected $table ='tasks';

    protected $fillable = ['title'];

    public function user(){
        return $this-> belongsTo(User::class);
     }
}
