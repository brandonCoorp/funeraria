<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuariofotofecha
 * 
 * @property int $id
 * @property string|null $foto
 * @property int $usuario_id
 * @property Carbon|null $fecha_nac
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Usuariofotofecha extends Model
{
	protected $table = 'usuariofotofechas';
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int'
	];

	protected $dates = [
		'fecha_nac'
	];

	protected $fillable = [
		'foto',
		'usuario_id',
		'fecha_nac'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class);
	}
}
