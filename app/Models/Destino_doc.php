<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Destino_doc
 * @package App\Models
 * @version July 17, 2020, 1:39 am CAT
 *
 * @property integer doc_id
 * @property integer destino_id
 * @property string observacao
 * @property string ficheiro
 */
class Destino_doc extends Model
{
    use SoftDeletes;

    public $table = 'destino_doc';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'doc_id',
        'destino_id',
        'observacao',
        'ficheiro'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'doc_id' => 'integer',
        'destino_id' => 'integer',
        'observacao' => 'string',
        'ficheiro' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'doc_id' => 'required',
        'destino_id' => 'required',
        'observacao' => 'required',
        'ficheiro' => 'required'
    ];

    public function doc()
    {
        return $this->hasMany(Destino::class);
    }

}
