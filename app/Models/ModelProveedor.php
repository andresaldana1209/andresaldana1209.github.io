<?php namespace App\Models;

use CodeIgniter\Model;

Class ModelProveedor extends Model
{
    protected $table ='proveedor';
    protected $primaryKey = 'IDProveedor';
    protected $allowedFields = ['Nombre_Provee', 'Celular_Provee', 'Correo_Provee'];

    public function get($IDProveedor = null)
    {
        if($IDProveedor === null){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['IDProveedor' => $IDProveedor])
                    ->first();
    }

}

?>