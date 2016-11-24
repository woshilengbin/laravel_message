<?php
/**
 * Created by PhpStorm.
 * User: lengbin
 * Date: 2016/10/31
 * Time: 11:38
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    protected  $table = 'message';
    public $timestamps = true;
    public function belongsToUser()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
    protected function getDateFormat()
    {
        return time(); // TODO: Change the autogenerated stub
    }
    protected function asDateTime($value)
    {
        return $value; // TODO: Change the autogenerated stub
    }
}