<?php
namespace App\Repositories;
use App\Entities\Patient;

/**
 * Class PatientRepository
 *
 * @package App\Repositories
 */
class PatientRepository extends BaseRepository
{

    public function __construct(Patient $model)
    {
        $this->model = $model;
    }

    /**
     * @return array
     */
    public function getBuilderColumns()
    {
        $columns = array(
            ['data' => 'id', 'name' => 'id', 'title' => '#'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At']
        );
        return $columns;
    }

}