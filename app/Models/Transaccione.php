<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaccione
 * 
 * @property int $id
 * @property int|null $tipo
 * @property int|null $cantidad
 * @property Carbon|null $fecha
 * @property string|null $item_nombre
 * @property string|null $usuario
 * @property int $sucursal_id
 * 
 * @property Sucursal $sucursal
 *
 * @package App\Models
 */
class Transaccione extends Model
{
	protected $table = 'transacciones';
	public $timestamps = false;

	protected $casts = [
		'tipo' => 'int',
		'cantidad' => 'int',
		'sucursal_id' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'tipo',
		'cantidad',
		'fecha',
		'item_nombre',
		'usuario',
		'sucursal_id'
	];

	public function sucursal()
	{
		return $this->belongsTo(Sucursal::class);
	}
}
