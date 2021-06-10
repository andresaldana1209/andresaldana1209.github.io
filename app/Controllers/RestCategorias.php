<?php namespace App\Controllers;

use App\Models\ModelCategorias;

use CodeIgniter\RESTful\ResourceController;


class RestCategorias extends ResourceController
{
    protected $modelName = 'App\Models\ModelCategorias';
    protected $format    = 'json';
	



	public function index()
	{
		return $this->respond($this->model->findAll());

		
	}

	public function show($IDCategoria = null)
	{
		if($IDCategoria == null)
		{
			return $this->genericResponse(null, "Codigo de la Categoria NO encontrado",200);
		}

		$categorias = $this->model->find($IDCategoria);
		
		if(!$categorias)
		{
			return $this->genericResponse(null,"Categoria No existe", 500);
		}
		
		return $this->genericResponse($categorias,"", 200);

		
	}


	public function create()
    {
 
        $categorias = new ModelCategorias();

		  
        if ($this->validate('categorias')) {
 
 
            $var1 =  $this->request->getJsonVar('Nombre_cat');
		    $var2 =  $this->request->getJsonVar('Imagen_cat');
		

		   $IDCategoria = $categorias->insert([
			'Nombre_cat'  => $var1,
			'Imagen_cat' => $var2
		     ]);

            return $this->genericResponse($this->model->find($IDCategoria), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	
	public function update($IDCategoria = null)
    {
 
        $categorias = new ModelCategorias();

		
 
        if ($this->validate('categorias')) {
 
			if (!$categorias->get($IDCategoria)) {
                return $this->genericResponse(null, array("IDCategoria" => "Categoria no existe"), 500);
            }
 
            $categorias->update($IDCategoria, [
                'Nombre_cat' => $this->request->getJsonVar('Nombre_cat'),
                'Imagen_cat' => $this->request->getJsonVar('Imagen_cat')
            ]);
 
            return $this->genericResponse($this->model->find($IDCategoria), null, 200);
        }
 
        $validation = \Config\Services::validation();
 
        return $this->genericResponse(null, $validation->getErrors(), 500);
    }

	public function delete($IDCategoria = null)
	{
		$this->model->delete($IDCategoria);
		
		return $this->genericResponse("Categoria N° $IDCategoria Eliminado Correctamente","", 200);

		
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