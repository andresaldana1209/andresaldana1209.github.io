<?php namespace App\Controllers;

use App\Models\ModelCliente;

use CodeIgniter\RESTful\ResourceController;


class RestCliente extends ResourceController
{
    protected $modelName = 'App\Models\ModelCliente';
    protected $format    = 'json';
	



	public function index()
	{
		return $this->respond($this->model->findAll());

		
	}

	public function show($ID_Cliente = null)
	{

        
        
		if($ID_Cliente == null)
		{
			return $this->genericResponse(null, "Codigo del Cliente NO encontrado",200);
		}

		$cliente = $this->model->find($ID_Cliente);
        
	
		if(!$cliente)
		{
			return $this->genericResponse(null,"Cliente No existe", 500);
		}
		
        
		return $this->genericResponse($cliente,"", 200);

		
	}


	public function create()
    {
 
        $cliente = new ModelCliente();

		 

 
        if ($this->validate('cliente')) {
 
 
            $var1 =  $this->request->getJsonVar('Cedula');
		    $var2 =  $this->request->getJsonVar('Nombre_Cli');
            $var3 =  $this->request->getJsonVar('Apellido_Cli');
            $var4 =  $this->request->getJsonVar('Celular_Cli');
            $var5 =  $this->request->getJsonVar('Direccion_Cli');

            $var6 = $this->request->getJsonVar('Contraseña');
            
            
		

		   $ID_Cliente = $cliente->insert([
			'Cedula'        => $var1,
			'Nombre_Cli'    => $var2,
            'Apellido_Cli'  => $var3,
            'Celular_Cli'   => $var4,
            'Direccion_Cli' => $var5,
            'Contraseña'    => $var6
		     ]);

            return $this->genericResponse($this->model->find($ID_Cliente), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	
	public function update($ID_Cliente = null)
    {
 
        $cliente = new ModelCliente();

		
 
        if ($this->validate('cliente')) {
 
			if (!$cliente->get($ID_Cliente)) {
                return $this->genericResponse(null, array("ID_Cliente" => "Cliente no existe"), 500);
            }
 
             $varc = $this->request->getJsonVar('Contraseña');
             // $encriptacion =  password_hash($var6, PASSWORD_DEFAULT);
             
            $cliente->update($ID_Cliente, [
                'Cedula' => $this->request->getJsonVar('Cedula'),
                'Nombre_Cli' => $this->request->getJsonVar('Nombre_Cli'),
                'Apellido_Cli' => $this->request->getJsonVar('Apellido_Cli'),
                'Celular_Cli' => $this->request->getJsonVar('Celular_Cli'),
                'Direccion_Cli' => $this->request->getJsonVar('Direccion_Cli'),
                'Contraseña' => $varc
            ]);
 
            return $this->genericResponse($this->model->find($ID_Cliente), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	public function delete($ID_Cliente = null)
	{
		$this->model->delete($ID_Cliente);
		
		return $this->genericResponse("Cliente N° $ID_Cliente Eliminado Correctamente","", 200);

		
	}



	private function genericResponse($data, $msj, $code)
	{
		if ($code == 200) {
            return $this->respond(array("data" => $data, "code" => $code)); //, 404, "No hay nada"
        } 
		else 
		{
            return $this->respond(array( "msj" => $msj, "code" => $code));
		}
	}

    
}
?>