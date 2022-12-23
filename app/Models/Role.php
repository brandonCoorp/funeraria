<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Privilegio[] $privilegios
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function privilegios()
	{
		return $this->hasMany(Privilegio::class);
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class);
	}
}
