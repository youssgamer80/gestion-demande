<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $telephone
 * @property Carbon $date_naissance
 * @property string $profession
 * 
 * @property Collection|Demande[] $demandes
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'utilisateur';
	public $timestamps = false;

	protected $dates = [
		'date_naissance'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'email',
		'telephone',
		'date_naissance',
		'profession'
	];

	public function demandes()
	{
		return $this->hasMany(Demande::class, 'utilisateur_id_fk');
	}
}
