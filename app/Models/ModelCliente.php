<?php namespace App\Models;

use CodeIgniter\Model;

Class ModelCliente extends Model
{
    protected $table ='cliente';
    protected $primaryKey = 'ID_Cliente';
    protected $allowedFields = ['Cedula', 'Nombre_Cli', 'Apellido_Cli', 'Celular_Cli',
                                'Direccion_Cli', 'Contraseña'];

    public function get($ID_Cliente = null)
    {
        if($ID_Cliente === null){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['ID_Cliente' => $ID_Cliente])
                    ->first();
    }

}

?>