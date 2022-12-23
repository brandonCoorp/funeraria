<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class Pago extends Model
{
	protected $table = 'pagos';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function compras()
	{
		return $this->hasMany(Compra::class);
	}
}
