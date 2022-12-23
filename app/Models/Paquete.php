<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paquete
 * 
 * @property int $id
 * @property string $cod_paquete
 * @property string $nombre
 * @property string|null $descripcion
 * @property float|null $costo
 * 
 * @property Collection|Servicio[] $servicios
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class Paquete extends Model
{
	protected $table = 'paquetes';
	public $timestamps = false;

	protected $casts = [
		'costo' => 'float'
	];

	protected $fillable = [
		'cod_paquete',
		'nombre',
		'descripcion',
		'costo'
	];

	public function servicios()
	{
		return $this->belongsToMany(Servicio::class, 'paqueteservicio')
					->withPivot('cod_servicio');
	}

	public function compras()
	{
		return $this->hasMany(Compra::class);
	}
}
