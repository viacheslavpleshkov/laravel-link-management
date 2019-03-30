<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	/**
	 * @var array
	 */
	protected $guarded = ['id'];
	/**
	 * @var string
	 */
	protected $table = 'urls';
	/**
	 * @var array
	 */
	protected $fillable = [
		'url_key',
		'url_site',
		'views',
		'user_id',
		'status'
	];

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeStatus($query)
	{
		return $query->where('status', 1);
	}

	/**
	 * @param $query
	 * @param $id
	 * @return mixed
	 */
	public function scopeFindUrl($query, $id)
	{
		return $query->where('id', $id);
	}

	/**
	 * @param $query
	 * @param $id
	 * @return mixed
	 */
	public function scopeAnonymousUser($query, $id)
	{
		return $query->where('user_id', 1);
	}
}
