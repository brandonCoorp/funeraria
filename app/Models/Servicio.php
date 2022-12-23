<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 * 
 * @property int $id
 * @property string $cod_servicio
 * @property string $nombre
 * @property string|null $descripcion
 * @property float|null $costo
 * 
 * @property Collection|Item[] $items
 * @property Collection|Paquete[] $paquetes
 *
 * @package App\Models
 */
class Servicio extends Model
{
	protected $table = 'servicios';
	public $timestamps = false;

	protected $casts = [
		'costo' => 'float'
	];

	protected $fillable = [
		'cod_servicio',
		'nombre',
		'descripcion',
		'costo'
	];

	public function items()
	{
		return $this->belongsToMany(Item::class, 'itemservicio')
					->withPivot('cantidad', 'cod_item');
	}

	public function paquetes()
	{
		return $this->belongsToMany(Paquete::class, 'paqueteservicio')
					->withPivot('cod_servicio');
	}
}
