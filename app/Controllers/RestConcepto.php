<?php namespace App\Controllers;

use App\Models\ModelConcepto;
use App\Models\ModelProducto;
use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;


class RestConcepto extends ResourceController
{
    protected $modelName = 'App\Models\ModelConcepto';
    protected $format    = 'json';
	protected $modelName2 = 'App\Models\ModelProducto';
	



	public function index()
	{
		return $this->respond($this->model->findAll());

		
	}

	public function show($Id_concepto = null)
	{
		if($Id_concepto == null)
		{
			return $this->genericResponse(null, "Codigo del concepto NO encontrado",200);
		}

		$concepto = $this->model->find($Id_concepto);
		
		if(!$concepto)
		{
			return $this->genericResponse(null,"concepto No existe", 500);
		}
		
		return $this->genericResponse($concepto,"", 200);

		
	}


	public function create()
    {
 
        $concepto = new ModelConcepto();

        

 
        if ($this->validate('concepto')) {
 
            // $EProd = $this->request->getJsonVar('IDProducto');
			// $stoc = $this->request->getJsonVar('Stock');
			// $producto = new ModelProducto();
			
			// $producto = $this->model->find($EProd);

			
			// $producto->update($EProd, [
                
			// 	'Stock' => $stoc - 1
				
            // ]);

			
			// $this->model->save($producto);
			// if($producto->Stock > 0 && $producto->Precio == $this->request->getJsonVar('Precio'))
			// {
				// $cant = $producto->ge Stock;
				// $cant = $cant - 1 ;
				//  echo $cant;
				//  echo $producto->Stock;
				 

				// $venta = $producto->Ventas_P;
				// $venta = $venta + 1 ;


				
				$var1 =  $this->request->getJsonVar('Id_Venta');
				$var2 =  $this->request->getJsonVar('IDProducto');
				$var3 =  $this->request->getJsonVar('Precio');
			
	
			   $Id_concepto = $concepto->insert([
				'Id_Venta'   => $var1,
				'IDProducto' => $var2,
				'Precio'     => $var3
				 ]);

				
				//  $EProd = $producto->update([
				// 	'Stock'   => $cant,
				// 	'Ventas_P' => $venta					
				// 	 ]);
	            
				return $this->genericResponse($this->model->find($Id_concepto), null, 200);
			// }


        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	
	public function update($Id_concepto = null)
    {
 
        $concepto = new ModelConcepto();


		
 
        if ($this->validate('concepto')) {
 
			if (!$concepto->get($Id_concepto)) {
                return $this->genericResponse(null, array("Id_concepto" => "concepto no existe"), 500);
            }
 
            $concepto->update($Id_concepto, [
                'Id_Venta'   => $this->request->getJsonVar('Id_Venta'),
                'IDProducto' => $this->request->getJsonVar('IDProducto'),
                'Precio'     => $this->request->getJsonVar('Precio')
            ]);
 
            return $this->genericResponse($this->model->find($Id_concepto), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }


	public function delete($Id_concepto = null)
	{
		$this->model->delete($Id_concepto);
		
		return $this->genericResponse("Concepto N° $Id_concepto Eliminado Correctamente","", 200);

		
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