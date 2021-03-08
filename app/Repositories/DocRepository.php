<?php

namespace App\Repositories;

use App\Models\Doc;
use App\Repositories\BaseRepository;

/**
 * Class DocRepository
 * @package App\Repositories
 * @version February 22, 2020, 12:38 am UTC
*/

class DocRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nrDoc',
        'referencia',
        'remetente',
        'email',
        'file',
        'categoria',
        'origem',
        'assunto',
        'descricao',
        'estado_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Doc::class;
    }
}
