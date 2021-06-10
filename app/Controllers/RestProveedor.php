<?php namespace App\Controllers;

use App\Models\ModelProveedor;

use CodeIgniter\RESTful\ResourceController;


class RestProveedor extends ResourceController
{
    protected $modelName = 'App\Models\ModelProveedor';
    protected $format    = 'json';
	



	public function index()
	{
		return $this->respond($this->model->findAll());

		
	}

	public function show($IDProveedor = null)
	{
		if($IDProveedor == null)
		{
			return $this->genericResponse(null, "Codigo del Proveedor NO encontrado",200);
		}

		$proveedor = $this->model->find($IDProveedor);
		
		if(!$proveedor)
		{
			return $this->genericResponse(null,"Proveedor No existe", 500);
		}
		
		return $this->genericResponse($proveedor,"", 200);

		
	}


	public function create()
    {
 
        $proveedor = new ModelProveedor();

		 

 
        if ($this->validate('proveedor')) {
 
 
            $var1 =  $this->request->getJsonVar('Nombre_Provee');
		    $var2 =  $this->request->getJsonVar('Celular_Provee');
            $var3 =  $this->request->getJsonVar('Correo_Provee');
		

		   $IDProveedor = $proveedor->insert([
			'Nombre_Provee'  => $var1,
			'Celular_Provee' => $var2,
            'Correo_Provee'  => $var3
		     ]);

            return $this->genericResponse($this->model->find($IDProveedor), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	
	public function update($IDProveedor = null)
    {
 
        $proveedor = new ModelProveedor();

		
 
        if ($this->validate('proveedor')) {
 
			if (!$proveedor->get($IDProveedor)) {
                return $this->genericResponse(null, array("IDProveedor" => "Proveedor no existe"), 500);
            }
 
            $proveedor->update($IDProveedor, [
                'Nombre_Provee'  => $this->request->getJsonVar('Nombre_Provee'),
                'Celular_Provee' => $this->request->getJsonVar('Celular_Provee'),
                'Correo_Provee'  => $this->request->getJsonVar('Correo_Provee')
            ]);
 
            return $this->genericResponse($this->model->find($IDProveedor), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	public function delete($IDProveedor = null)
	{
		$this->model->delete($IDProveedor);
		
		return $this->genericResponse("Proveedor N° $IDProveedor Eliminado Correctamente","", 200);

		
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