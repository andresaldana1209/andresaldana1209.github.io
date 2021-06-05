<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $cliente =[
		'Cedula'        => 'required|min_length[1]|max_length[15]',
		'Nombre_Cli'    => 'min_length[1]|max_length[50]',
        'Apellido_Cli'  => 'min_length[1]|max_length[50]',
        'Celular_Cli'   => 'min_length[1]|max_length[20]',
        'Direccion_Cli' => 'min_length[1]|max_length[255]',
        'Contraseña'    => 'required|min_length[8]|max_length[20]'
	];

	public $proveedor =[
		'Nombre_Provee'    => 'required|min_length[1]|max_length[50]',
        'Celular_Provee'   => 'min_length[1]|max_length[20]',
        'Correo_Provee'    => 'required|min_length[1]|max_length[100]'
	];

	public $venta =[
		'cedula'   => 'min_length[1]|max_length[20]',
        'Fecha_V'  => 'min_length[1]|max_length[100]',
        'Total'    => 'min_length[1]|max_length[50]',
	];

	public $concepto =[
		'Id_Venta' => 'required|min_length[1]|max_length[50]',
        'IDProducto'      => 'required|min_length[1]|max_length[100]',
		'Precio'      => 'required|min_length[1]|max_length[100]'
	];

	public $categorias =[
		'Nombre_cat'    => 'required|min_length[1]|max_length[45]',
        'Imagen_cat'   => 'min_length[1]|max_length[255]'
	];

	public $producto =[
		'Codigo_Prod' => 'required|min_length[1]|max_length[50]',
		'Nombre_p'    => 'min_length[1]|max_length[100]',
        'Descripcion' => 'min_length[1]|max_length[300]',
        'Marca'       => 'min_length[1]|max_length[20]',
        'Stock'       => 'min_length[1]|max_length[20]',
        'Precio'      => 'required|min_length[1]|max_length[50]',
		'Garantia'    => 'min_length[1]|max_length[50]',
		'IdProveedor' => 'min_length[1]|max_length[10]',
		'IdCategoria' => 'min_length[1]|max_length[10]'
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
