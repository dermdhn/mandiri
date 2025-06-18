<?php

namespace App\Modules\DigitalSign\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Jadwal extends Model 
{
    use HasFactory, SoftDeletes, HasUuids;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	protected $table = 'jadwal';
	protected $primaryKey = 'id';
    protected $fillable = ['title', 'icon', 'room_id', 'start_time', 'end_time',  'created_by', 'updated_by', 'deleted_by'];

    public static function validation_data($update_id = "NULL") {
        return [
	        'title'		=> 'required|string',
            'icon'		=> 'required|string',
            'room_id'		=> 'required|string',
            'start_time'		=> 'required',
            'end_time'		=> 'required',
            
        ];
    }

	
}
