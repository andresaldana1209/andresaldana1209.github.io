<?php namespace App\Models;

use CodeIgniter\Model;

Class ModelProducto extends Model
{
    protected $table ='producto';
    protected $primaryKey = 'IDProducto';
    protected $allowedFields = ['Codigo_Prod', 'Nombre_p', 'Descripcion', 'Marca',
                                'Stock', 'Precio', 'Garantia', 'IdProveedor', 'IdCategoria', 'Foto_P', 'Ventas_P'];

    public function get($IDProducto = null)
    {
        if($IDProducto === null){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['IDProducto' => $IDProducto])
                    ->first();
    }

}

?>