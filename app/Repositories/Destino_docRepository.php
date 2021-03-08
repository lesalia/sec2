<?php

namespace App\Repositories;

use App\Models\Destino_doc;
use App\Repositories\BaseRepository;

/**
 * Class Destino_docRepository
 * @package App\Repositories
 * @version July 17, 2020, 1:39 am CAT
*/

class Destino_docRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'doc_id',
        'destino_id',
        'observacao',
        'ficheiro'
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
        return Destino_doc::class;
    }
}
