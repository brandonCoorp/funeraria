<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Privilegio
 * 
 * @property int $permiso_id
 * @property int $role_id
 * @property string|null $cod_permiso
 * 
 * @property Permiso $permiso
 * @property Role $role
 *
 * @package App\Models
 */
class Privilegio extends Model
{
	protected $table = 'privilegios';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'permiso_id' => 'int',
		'role_id' => 'int'
	];

	protected $fillable = [
		'cod_permiso',
		'permiso_id',
		'role_id',
	];

	public function permiso()
	{
		return $this->belongsTo(Permiso::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
