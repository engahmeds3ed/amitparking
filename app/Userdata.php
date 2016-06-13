<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    protected $table = '';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public static $couchbase_bucket = 'amitparking';
    public static $couchbase_doc = 'doc1';

    protected $fillable = [
        'id',
        'langtitude',
        'latitude'
    ];
    
    public static function create(array $attributes = array()){
    	die(print_r($attributes));
    	$value = [
		    'id' => intval($attributes['id']),
		    'langtitude' => $attributes['langtitude'],
		    'latitude' => $attributes['latitude'],
		    'userNumber' => intval($attributes['userNumber']),
		    'address' => $attributes['address'],
		    'userFK' => intval($attributes['userFK']),
		];
		$key = 'insert:and:delete';

		$result = \DB::connection('couchbase')->table(self::$couchbase_bucket)->key($key)->upsert($value);

		return $result;
    }

    public static function all($columns = array()){
		return \DB::connection('couchbase')->table(self::$couchbase_bucket)->get();
    }

    public static function one($id){
    	return \DB::connection('couchbase')->table(self::$couchbase_bucket)->where('id',$id)->get();
    }
    
}
