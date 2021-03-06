<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estado
 * @package App\Models
 * @version July 17, 2020, 12:09 am CAT
 *
 * @property string designacao
 * @property string detalhe
 */
class Estado extends Model
{
    use SoftDeletes;

    public $table = 'estados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'designacao',
        'detalhe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'designacao' => 'string',
        'detalhe' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'designacao' => 'required',
        'detalhe' => 'required'
    ];

    public function docs()
    {
        return $this->hasMany(Doc::class);
    }


}
