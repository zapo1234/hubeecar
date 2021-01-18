<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
	protected $table = 'inscription';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nom', 'adresse','age', 'pays',
	];
}