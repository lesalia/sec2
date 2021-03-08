<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

/**
 * Class Doc
 * @package App\Models
 * @version February 22, 2020, 12:38 am UTC
 *
 * @property integer user_id
 * @property string nrDoc
 * @property string remetente
 * @property string email
 * @property string proveniencia
 * @property string destino
 * @property string assunto
 * @property string descricao
 * @property boolean estado_id
 */
class Doc extends Model
{
    use SoftDeletes;

    public $table = 'docs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'nrDoc',
        'referencia',
        'remetente',
        'email',
        'categoria',
        'origem',
        'file',
        'assunto',
        'descricao',
        'estado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'nrDoc' => 'string',
        'referencia' => 'string',
        'remetente' => 'string',
        'email' => 'string',
        'origem' => 'string',
        'file' => 'string',
        'categoria' => 'string',
        'assunto' => 'string',
        'descricao' => 'string',
        'estado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'referencia',
        'origem' => 'required',
        'remetente' => 'required',
        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        'assunto' => 'required',
        //'file' => 'required|max:5000|mimes:pdf',
        'categoria' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function despacho()
    {
        return $this->hasOne(Despacho::class);
    }

    public function destinos()
    {
        return $this->belongsToMany(Destino::class, 'Destino_doc')->withPivot('created_at');
    }

}
