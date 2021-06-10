<?php namespace App\Models;

use CodeIgniter\Model;

Class ModelLogin extends Model
{
    protected $table ='cliente';
    protected $primaryKey = 'Cedula';
    protected $allowedFields = ['Cedula', 'Contraseña'];

    public function get($Cedula = null)
    {
        if($Cedula === null){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['Cedula' => $Cedula])
                    ->first();
    }

}

?>