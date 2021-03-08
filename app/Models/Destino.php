<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Destino
 * @package App\Models
 * @version July 16, 2020, 10:53 pm CAT
 *
 * @property string designacao
 * @property string chefe
 * @property string email
 */
class Destino extends Model
{
    use SoftDeletes;

    public $table = 'destinos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'designacao',
        'chefe',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'designacao' => 'string',
        'chefe' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'designacao' => 'required',
        'chefe' => 'required',
        'email' => 'required'
    ];

    public function docs()
    {
        return $this->belongsToMany(Doc::class, 'Destino_doc')->withPivot('created_at');
    }

}
