<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Visita
 * 
 * @property int $id
 * @property int|null $contador
 * @property Carbon|null $fecha
 * @property int $usuario_id
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Visita extends Model
{
	protected $table = 'visitas';
	public $timestamps = false;

	protected $casts = [
		'contador' => 'int',
		'usuario_id' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'contador',
		'fecha',
		'usuario_id'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class);
	}
}
