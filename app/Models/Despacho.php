<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Despacho
 * @package App\Models
 * @version March 11, 2020, 1:04 am CAT
 *
 * @property integer doc_id
 * @property string user
 * @property string file
 * @property integer user_id
 * @property string obs
 */
class Despacho extends Model
{
    use SoftDeletes;

    public $table = 'despachos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'doc_id',
        'user',
        'file',
        'user_id',
        'obs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'doc_id' => 'integer',
        'user' => 'string',
        'file' => 'string',
        'user_id' => 'integer',
        'obs' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'file' => 'required',
    ];

     public function doc()
    {
        return $this->belongsTo(Doc::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
