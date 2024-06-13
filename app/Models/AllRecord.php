<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllRecord extends Model
{
	use HasFactory;

	protected $primaryKey = 'id';

	protected $table = 'all_records';

	protected $guarded = ['id'];
}
