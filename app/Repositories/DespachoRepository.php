<?php

namespace App\Repositories;

use App\Models\Despacho;
use App\Repositories\BaseRepository;

/**
 * Class DespachoRepository
 * @package App\Repositories
 * @version March 11, 2020, 1:04 am CAT
*/

class DespachoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'doc_id',
        'user',
        'file',
        'user_id',
        'obs'
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
        return Despacho::class;
    }
}
