<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Sistema
	$route['default_controller'] 								= 'login';
	$route['404_override'] 										= '';
	$route['translate_uri_dashes'] 								= FALSE;
	$route['login'] 											= 'login';
	$route['logar'] 											= 'login';
	$route['recuperar-senha'] 									= 'login/recuperar_senha';
	$route['sair'] 												= 'login/sair';

// Home
	$route['home'] 												= 'home';

// Usuários
	$route['usuarios'] 											= 'usuarios';
	$route['usuarios/pesquisa'] 								= 'usuarios/pesquisa';
	$route['usuarios/cadastrar']                           		= 'usuarios/cadastrar';
	$route['usuarios/editar/(:num)']                           	= 'usuarios/editar/$1';
	$route['usuarios/excluir/(:num)']                           = 'usuarios/excluir/$1';

// Banner's
	$route['banner'] 											= 'banner';
	$route['banner/pesquisa'] 									= 'banner/pesquisa';
	$route['banner/cadastrar']                           		= 'banner/cadastrar';
	$route['banner/editar/(:num)']                           	= 'banner/editar/$1';
	$route['banner/excluir/(:num)']                           	= 'banner/excluir/$1';

// Empreendimentos
	$route['empreendimentos'] 									= 'empreendimentos';
	$route['empreendimentos/pesquisa'] 							= 'empreendimentos/pesquisa';
	$route['empreendimentos/cadastrar']                  		= 'empreendimentos/cadastrar';
	$route['empreendimentos/editar/(:num)']                    	= 'empreendimentos/editar/$1';
	$route['empreendimentos/excluir/(:num)']                    = 'empreendimentos/excluir/$1';	
	$route['empreendimentos/excluirlazer/(:num)']              	= 'empreendimentos/excluirlazer/$1';
	$route['empreendimentos/excluirplanta/(:num)']              = 'empreendimentos/excluirplanta/$1';
	$route['empreendimentos/excluirobra/(:num)']  	            = 'empreendimentos/excluirobra/$1';

// Tabelas
	$route['tabelas'] 											= 'tabelas';
	$route['tabelas/cadastrar']                  				= 'tabelas/cadastrar';
	$route['tabelas/editar/(:num)']                    			= 'tabelas/editar/$1';
	$route['tabelas/excluir/(:num)']                    		= 'tabelas/excluir/$1';

// Corretores
	$route['corretores'] 										= 'corretores';
	$route['corretores/pag/(:num)'] 							= 'corretores/pag/$1';
	$route['corretores/pesquisa'] 								= 'corretores/pesquisa';
	$route['corretores/exportar'] 								= 'corretores/exportar';
	$route['corretores/editar/(:num)'] 							= 'corretores/editar/$1';
	$route['corretores/excluir/(:num)'] 						= 'corretores/excluir/$1';