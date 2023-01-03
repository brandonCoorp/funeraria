<?php

namespace App\Traits;

use App\Models\Usuario;
use App\Models\Role;

trait UsuarioTrait {
    public function role()
	{
		return $this->belongsTo(Role::class);
	}

    public function verificarPermiso($permiso)
	{
		
	
		$privilegios = $this->role->privilegios;
		//echo($permiso);
		//dd($privilegios);
		foreach ($privilegios as $key => $privilegio) {
			# code...
			if($privilegio->cod_permiso == 'All'){return true;}
			if($privilegio->cod_permiso ==  $permiso){ return true;}
		}
		return false;
	}
}

