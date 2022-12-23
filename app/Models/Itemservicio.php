<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Itemservicio
 * 
 * @property int $item_id
 * @property int $servicio_id
 * @property int|null $cantidad
 * @property string|null $cod_item
 * 
 * @property Item $item
 * @property Servicio $servicio
 *
 * @package App\Models
 */
class Itemservicio extends Model
{
	protected $table = 'itemservicio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'item_id' => 'int',
		'servicio_id' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'cantidad',
		'cod_item'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function servicio()
	{
		return $this->belongsTo(Servicio::class);
	}
}
