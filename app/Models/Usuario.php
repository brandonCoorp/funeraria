<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string|null $password
 * @property string|null $mail
 * @property int $persona_id
 * @property int $role_id
 * @property Carbon|null $fecha_nac
 * @property string|null $foto
 * 
 * @property Persona $persona
 * @property Role $role
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
	protected $table = 'usuarios';
	public $timestamps = false;

	protected $casts = [
		'persona_id' => 'int',
		'role_id' => 'int'
	];

	protected $dates = [
		'fecha_nac'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password',
		'mail',
		'persona_id',
		'role_id',
		'fecha_nac',
		'foto'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
