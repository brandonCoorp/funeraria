<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class Usuario
 * 
 * @property int $id
 * @property string|null $password
 * @property string|null $mail
 * @property int $persona_id
 * @property int $role_id
 * 
 * @property Persona $persona
 * @property Role $role
 * @property Collection|Usuariofotofecha[] $usuariofotofechas
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

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password',
		'mail',
		'persona_id',
		'role_id'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function usuariofotofechas()
	{
		return $this->hasMany(Usuariofotofecha::class);
	}
}
