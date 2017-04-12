<?php

namespace App\Components;

/**
 * Class CheckDataFromUser
 * @package App\Components
 */
class CheckDataFromUser
{

    /**
     * @param array $data
     * @return bool|null
     * @throws \Exception
     */
    public function checkDataForEdit(array $data)
    {
        if (!empty($data['title']) && !empty($data['lead'])) {
            if (isset($data['id'])) {
                return true;
            }
            return false;
        }
        throw new \Exception('Не заполненны все данные');
    }

    /**
     * @param array $data
     * @return bool
     */
    public function checkDataForDelete(array $data)
    {
        return isset($data['id']) ?: false;
    }
}