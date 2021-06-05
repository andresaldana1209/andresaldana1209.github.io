<?php namespace App\Models;

use CodeIgniter\Model;

Class ModelCategorias extends Model
{
    protected $table ='categorias';
    protected $primaryKey = 'IDCategoria';
    protected $allowedFields = ['Nombre_cat', 'Imagen_cat'];

    public function get($IDCategoria = null)
    {
        if($IDCategoria === null){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['IDCategoria' => $IDCategoria])
                    ->first();
    }

}

?>