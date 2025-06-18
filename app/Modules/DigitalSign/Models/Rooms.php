<?php

namespace App\Modules\DigitalSign\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rooms extends Model 
{
    use HasFactory, SoftDeletes, HasUuids;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	protected $table = 'rooms';
	protected $primaryKey = 'id';
    protected $fillable = ['floor_id', 'nama', 'order', 'is_active',  'created_by', 'updated_by', 'deleted_by'];

    public static function validation_data($update_id = "NULL") {
        return [
	        'floor_id'		=> 'required|numeric',
            'nama'		=> 'required|string',
            'order'		=> 'required|numeric',
            'is_active'		=> 'required',
            
        ];
    }

	
}
