<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Administrator_auth extends Model
{
    protected $table = 'srvcredentials';
    protected $primaryKey = 'rrcredid';
    protected $keyType = 'integer';
    public $incrementing = true;
    protected $fillable = 
    [
        'rrcreduname',
        'rrcredpass',
        'rrcredemail',
        'rrcredvarify'
    ];
	
	public static function getAdminDetail($adminID){
		
		$adminQuery = DB::table('srvcredentials')->join('role_users','role_users.role_id','=','srvcredentials.urole_id')->where('srvcredentials.rrcredid',$adminID)->select('srvcredentials.*','role_users.role_name')->first();
		if($adminQuery){
			return $adminQuery;
		}
		
	}
}
