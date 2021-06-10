<?php namespace App\Controllers;

use App\Models\ModelVentas;

use CodeIgniter\RESTful\ResourceController;


class RestVentas extends ResourceController
{
    protected $modelName = 'App\Models\ModelVentas';
    protected $format    = 'json';
	



	public function index()
	{
		return $this->respond($this->model->findAll());

		
	}

	public function show($Id_ventas = null)
	{
		if($Id_ventas == null)
		{
			return $this->genericResponse(null, "Codigo de la venta NO encontrado",200);
		}

		$venta = $this->model->find($Id_ventas);
		
		if(!$venta)
		{
			return $this->genericResponse(null,"Venta No existe", 500);
		}
		
		return $this->genericResponse($venta,"", 200);

		
	}


	public function create()
    {
 
        $venta = new ModelVentas();

		 

 
        if ($this->validate('venta')) {
 
 
            $var1 =  $this->request->getJsonVar('cedula');
		    $var2 =  $this->request->getJsonVar('Fecha_V');
            $var3 =  $this->request->getJsonVar('Total');
		

		   $Id_ventas = $venta->insert([
			'cedula'  => $var1,
			'Fecha_V' => $var2,
            'Total'  => $var3
		     ]);

            return $this->respond($this->model->find($Id_ventas));
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	
	public function update($Id_ventas = null)
    {
 
        $venta = new ModelVentas();

		
 
        if ($this->validate('venta')) {
 
			if (!$venta->get($Id_ventas)) {
                return $this->genericResponse(null, array("Id_ventas" => "Venta no existe"), 500);
            }
 
            $venta->update($Id_ventas,[
                'cedula'  => $this->request->getJsonVar('cedula'),
                'Fecha_V' => $this->request->getJsonVar('Fecha_V'),
                'Total'  => $this->request->getJsonVar('Total')
            ]);
 
            return $this->genericResponse($this->model->find($Id_ventas), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }


	public function delete($Id_ventas = null)
	{
		$this->model->delete($Id_ventas);
		
		return $this->genericResponse("Venta N° $Id_ventas Eliminado Correctamente","", 200);

		
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