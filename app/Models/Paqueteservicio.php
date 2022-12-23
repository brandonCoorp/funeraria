<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paqueteservicio
 * 
 * @property int $paquete_id
 * @property int $servicio_id
 * @property string|null $cod_servicio
 * 
 * @property Paquete $paquete
 * @property Servicio $servicio
 *
 * @package App\Models
 */
class Paqueteservicio extends Model
{
	protected $table = 'paqueteservicio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'paquete_id' => 'int',
		'servicio_id' => 'int'
	];

	protected $fillable = [
		'cod_servicio'
	];

	public function paquete()
	{
		return $this->belongsTo(Paquete::class);
	}

	public function servicio()
	{
		return $this->belongsTo(Servicio::class);
	}
}
