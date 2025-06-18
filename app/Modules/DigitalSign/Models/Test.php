<?php
namespace App\Modules\DigitalSign\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	protected $table = 'test';
	protected $primaryKey = 'id_test';
    protected $fillable = ['key', 'desc', 'created_by', 'updated_by', 'deleted_by'];
}
