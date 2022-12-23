<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id
 * @property string|null $telefono
 * @property int|null $tipo
 * @property int $persona_id
 * 
 * @property Persona $persona
 * @property Collection|Compra[] $compras
 * @property Collection|Contrato[] $contratos
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'clientes';
	public $timestamps = false;

	protected $casts = [
		'tipo' => 'int',
		'persona_id' => 'int'
	];

	protected $fillable = [
		'telefono',
		'tipo',
		'persona_id'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class);
	}

	public function compras()
	{
		return $this->hasMany(Compra::class);
	}

	public function contratos()
	{
		return $this->hasMany(Contrato::class);
	}
}
