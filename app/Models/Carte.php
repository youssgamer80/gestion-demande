<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carte
 * 
 * @property int $id
 * @property string $carte
 * @property int $demande_id_fk
 * 
 * @property Demande $demande
 *
 * @package App\Models
 */
class Carte extends Model
{
	protected $table = 'carte';
	public $timestamps = false;

	protected $casts = [
		'demande_id_fk' => 'int'
	];

	protected $fillable = [
		'carte',
		'demande_id_fk'
	];

	public function demande()
	{
		return $this->belongsTo(Demande::class, 'demande_id_fk');
	}
}
