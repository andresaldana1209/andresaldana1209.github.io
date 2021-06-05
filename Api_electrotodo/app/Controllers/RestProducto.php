<?php namespace App\Controllers;

use App\Models\ModelProducto;

use CodeIgniter\RESTful\ResourceController;


class RestProducto extends ResourceController
{
    protected $modelName = 'App\Models\ModelProducto';
    protected $format    = 'json';
	



	public function index()
	{
		return $this->respond($this->model->findAll());

		
	}

	public function show($IDProducto = null)
	{
		if($IDProducto == null)
		{
			return $this->genericResponse(null, "Codigo del Producto NO encontrado",200);
		}

		$producto = $this->model->find($IDProducto);
		
		if(!$producto)
		{
			return $this->genericResponse(null,"Producto No existe", 500);
		}
		
		return $this->genericResponse($producto,"", 200);

		
	}


	public function create()
    {
 
        $producto = new ModelProducto();

		  
        if ($this->validate('producto')) {
 
 
            $var1 =  $this->request->getJsonVar('Codigo_Prod');
		    $var2 =  $this->request->getJsonVar('Nombre_p');
			$var10 =  $this->request->getJsonVar('Foto_P');
			$var11 =  $this->request->getJsonVar('Ventas_P');
			$var3 =  $this->request->getJsonVar('Descripcion');
			$var4 =  $this->request->getJsonVar('Marca');
			$var5 =  $this->request->getJsonVar('Stock');
			$var6 =  $this->request->getJsonVar('Precio');
			$var7 =  $this->request->getJsonVar('Garantia');
			$var8 =  $this->request->getJsonVar('IdProveedor');
			$var9 =  $this->request->getJsonVar('IdCategoria');

		   $IDProducto = $producto->insert([
			'Codigo_Prod' => $var1,
			'Nombre_p'    => $var2,
			'Descripcion' => $var3,
			'Marca'       => $var4,
			'Stock'       => $var5,
			'Precio'      => $var6,
			'Garantia'    => $var7,
			'IdProveedor' => $var8,
			'IdCategoria' => $var9,
			'Foto_P'      => $var10,
			'Ventas_P'    => $var11
		     ]);

            return $this->genericResponse($this->model->find($IDProducto), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	
	public function update($IDProducto = null)
    {
 
        $producto = new ModelProducto();

		
 
        if ($this->validate('producto')) {
 
			if (!$producto->get($IDProducto)) {
                return $this->genericResponse(null, array("IDProducto" => "Producto no existe"), 500);
            }
 
            $producto->update($IDProducto, [
                'Codigo_Prod' => $this->request->getJsonVar('Codigo_Prod'),
                'Nombre_p' => $this->request->getJsonVar('Nombre_p'),
				'Ventas_P' => $this->request->getJsonVar('Ventas_P'),
				'Descripcion' => $this->request->getJsonVar('Descripcion'),
				'Marca' => $this->request->getJsonVar('Marca'),
				'Stock' => $this->request->getJsonVar('Stock'),
				'Precio' => $this->request->getJsonVar('Precio'),
				'Garantia' => $this->request->getJsonVar('Garantia'),
				'IdProveedor' => $this->request->getJsonVar('IdProveedor'),
				'IdCategoria' => $this->request->getJsonVar('IdCategoria'),
				'Foto_P' => $this->request->getJsonVar('Foto_P'),

            ]);
 
            return $this->genericResponse($this->model->find($IDProducto), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	public function delete($IDProducto = null)
	{
		$this->model->delete($IDProducto);
		
		return $this->genericResponse("Producto N° $IDProducto Eliminado Correctamente","", 200);

		
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