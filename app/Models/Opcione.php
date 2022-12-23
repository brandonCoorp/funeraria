<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Opcione
 * 
 * @property int $id
 * @property string|null $configuracion
 * @property string|null $valor
 * @property int $usuario_id
 *
 * @package App\Models
 */
class Opcione extends Model
{
	protected $table = 'opciones';
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int'
	];

	protected $fillable = [
		'configuracion',
		'valor',
		'usuario_id'
	];
}
