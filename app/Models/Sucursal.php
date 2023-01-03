<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sucursal
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $direccion
 * @property string|null $telefono
 * 
 * @property Collection|Item[] $items
 * @property Collection|Transaccione[] $transacciones
 *
 * @package App\Models
 */
class Sucursal extends Model
{
	protected $table = 'sucursal';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion',
		'direccion',
		'telefono'
	];

	public function items()
	{
		return $this->hasMany(Item::class);
	}

	public function transacciones()
	{
		return $this->hasMany(Transaccione::class);
	}
}
