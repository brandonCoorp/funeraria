<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * 
 * @property int $id
 * @property string|null $cod_item
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property int|null $cantidad
 * @property int|null $tipo
 * @property int|null $estado
 * @property float|null $costo_unit
 * @property int $sucursal_id
 * 
 * @property Sucursal $sucursal
 * @property Collection|Servicio[] $servicios
 *
 * @package App\Models
 */
class Item extends Model
{
	protected $table = 'items';
	public $timestamps = false;

	protected $casts = [
		'cantidad' => 'int',
		'tipo' => 'int',
		'estado' => 'int',
		'costo_unit' => 'float',
		'sucursal_id' => 'int'
	];

	protected $fillable = [
		'cod_item',
		'nombre',
		'descripcion',
		'cantidad',
		'tipo',
		'estado',
		'costo_unit',
		'sucursal_id'
	];

	public function sucursal()
	{
		return $this->belongsTo(Sucursal::class);
	}

	public function servicios()
	{
		return $this->belongsToMany(Servicio::class, 'itemservicio')
					->withPivot('cantidad', 'cod_item');
	}
}
