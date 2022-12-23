<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrato
 * 
 * @property int $id
 * @property string|null $motivo
 * @property int|null $estado
 * @property float|null $monto
 * @property int $cliente_id
 * @property int $compra_id
 * 
 * @property Cliente $cliente
 * @property Compra $compra
 *
 * @package App\Models
 */
class Contrato extends Model
{
	protected $table = 'contratos';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'monto' => 'float',
		'cliente_id' => 'int',
		'compra_id' => 'int'
	];

	protected $fillable = [
		'motivo',
		'estado',
		'monto',
		'cliente_id',
		'compra_id'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

	public function compra()
	{
		return $this->belongsTo(Compra::class);
	}
}
