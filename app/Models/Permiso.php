<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $cod_permiso
 * 
 * @property Collection|Privilegio[] $privilegios
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'cod_permiso'
	];

	public function privilegios()
	{
		return $this->hasMany(Privilegio::class);
	}
}
