<?php namespace App\Models;

use CodeIgniter\Model;

Class ModelVentas extends Model
{
    protected $table ='ventas';
    protected $primaryKey = 'Id_ventas';
    protected $allowedFields = ['cedula', 'Fecha_V', 'Total'];

    public function get($Id_ventas = null)
    {
        if($Id_ventas === null){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['Id_ventas' => $Id_ventas])
                    ->first();
    }

}

?>