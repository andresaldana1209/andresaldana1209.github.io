<?php namespace App\Models;

use CodeIgniter\Model;

Class ModelConcepto extends Model
{
    protected $table ='concepto';
    protected $primaryKey = 'Id_concepto';
    protected $allowedFields = ['Id_Venta', 'IDProducto', 'Precio'];

    public function get($Id_concepto  = null)
    {
        if($Id_concepto  === null){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['Id_concepto' => $Id_concepto])
                    ->first();
    }

}

?>