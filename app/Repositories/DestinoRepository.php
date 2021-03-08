<?php

namespace App\Repositories;

use App\Models\Destino;
use App\Repositories\BaseRepository;

/**
 * Class DestinoRepository
 * @package App\Repositories
 * @version July 16, 2020, 10:53 pm CAT
*/

class DestinoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'designacao',
        'chefe',
        'email'
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
        return Destino::class;
    }
}
