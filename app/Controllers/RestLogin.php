<?php namespace App\Controllers;

use App\Models\ModelLogin;

use CodeIgniter\RESTful\ResourceController;


class RestLogin extends ResourceController
{
    protected $modelName = 'App\Models\ModelLogin';
    protected $format    = 'json';
	



	public function index()
	{
		
		return $this->respond($this->model->findAll());

		
	}

	public function show($Cedula = null)
	{
		

		if($Cedula == null)
		{
			return $this->genericResponse(null, "Codigo del Cliente NO encontrado",200);
		}

		$cliente = $this->model->find($Cedula);
		

		if(!$cliente)
		{
			return $this->genericResponse("", "", 500);
		}
		
		return $this->genericResponse($cliente,"", 200);

		
	}

	

	private function genericResponse($data, $msj, $code)
	{
		if ($code == 200) {
            return $this->respond($data); //, 404, "No hay nada"
        } 
		else 
		{
            return $this->respond(array( "msj" => $msj, "code" => $code));
		}
	}

    
}
?>