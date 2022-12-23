<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comisione
 * 
 * @property int $id
 * @property string|null $mail
 * @property int|null $estado
 * @property float|null $monto
 * @property int $compra_id
 * 
 * @property Compra $compra
 *
 * @package App\Models
 */
class Comisione extends Model
{
	protected $table = 'comisiones';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int',
		'monto' => 'float',
		'compra_id' => 'int'
	];

	protected $fillable = [
		'mail',
		'estado',
		'monto',
		'compra_id'
	];

	public function compra()
	{
		return $this->belongsTo(Compra::class);
	}
}
