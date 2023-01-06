<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Demande
 * 
 * @property int $id
 * @property string $code
 * @property array $demande
 * @property Carbon $created_at
 * @property string $deleted_at
 * @property Carbon $updated_at
 * @property int|null $utilisateur_id_fk
 * @property string|null $fingerprint
 * @property string $status
 * 
 * @property Utilisateur|null $utilisateur
 * @property Collection|Carte[] $cartes
 *
 * @package App\Models
 */
class Demande extends Model
{
	use SoftDeletes;
	protected $table = 'demande';

	protected $casts = [
		'demande' => 'json',
		'utilisateur_id_fk' => 'int'
	];

	protected $fillable = [
		'code',
		'demande',
		'utilisateur_id_fk',
		'fingerprint',
		'status'
	];

	public function utilisateur()
	{
		return $this->belongsTo(Utilisateur::class, 'utilisateur_id_fk');
	}

	public function cartes()
	{
		return $this->hasMany(Carte::class, 'demande_id_fk');
	}
}
