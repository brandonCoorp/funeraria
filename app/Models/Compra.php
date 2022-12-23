<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $id
 * @property float|null $costo
 * @property Carbon|null $fecha
 * @property Carbon|null $fecha_entrega
 * @property int $pago_id
 * @property int $paquete_id
 * @property int $cliente_id
 * 
 * @property Pago $pago
 * @property Paquete $paquete
 * @property Cliente $cliente
 * @property Collection|Detallecompra[] $detallecompras
 * @property Collection|Comisione[] $comisiones
 * @property Collection|Contrato[] $contratos
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compras';
	public $timestamps = false;

	protected $casts = [
		'costo' => 'float',
		'pago_id' => 'int',
		'paquete_id' => 'int',
		'cliente_id' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecha_entrega'
	];

	protected $fillable = [
		'costo',
		'fecha',
		'fecha_entrega',
		'pago_id',
		'paquete_id',
		'cliente_id'
	];

	public function pago()
	{
		return $this->belongsTo(Pago::class);
	}

	public function paquete()
	{
		return $this->belongsTo(Paquete::class);
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

	public function detallecompras()
	{
		return $this->hasMany(Detallecompra::class);
	}

	public function comisiones()
	{
		return $this->hasMany(Comisione::class);
	}

	public function contratos()
	{
		return $this->hasMany(Contrato::class);
	}
}
