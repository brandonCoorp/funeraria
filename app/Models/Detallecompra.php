<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detallecompra
 * 
 * @property int $id
 * @property string|null $cod_item
 * @property int|null $cantidad
 * @property float|null $total
 * @property int $compra_id
 * 
 * @property Compra $compra
 *
 * @package App\Models
 */
class Detallecompra extends Model
{
	protected $table = 'detallecompras';
	public $timestamps = false;

	protected $casts = [
		'cantidad' => 'int',
		'total' => 'float',
		'compra_id' => 'int'
	];

	protected $fillable = [
		'cod_item',
		'cantidad',
		'total',
		'compra_id'
	];

	public function compra()
	{
		return $this->belongsTo(Compra::class);
	}
}
