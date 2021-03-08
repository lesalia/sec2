<?php

namespace App\Repositories;

use App\Models\Estado;
use App\Repositories\BaseRepository;

/**
 * Class EstadoRepository
 * @package App\Repositories
 * @version July 17, 2020, 12:09 am CAT
*/

class EstadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'designacao',
        'detalhe'
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
        return Estado::class;
    }
}
