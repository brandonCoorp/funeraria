<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 * 
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apellido_materno
 * @property string|null $apellido_paterno
 * @property string|null $direccion
 * 
 * @property Collection|Cliente[] $clientes
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Persona extends Model
{
	protected $table = 'personas';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'apellido_materno',
		'apellido_paterno',
		'direccion'
	];

	public function clientes()
	{
		return $this->hasMany(Cliente::class);
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class);
	}
}
