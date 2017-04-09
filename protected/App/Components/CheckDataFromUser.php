<?php

namespace App\Components;

/**
 * Class CheckDataFromUser
 * @package App
 */
class CheckDataFromUser
{
    /**
     * @param array $data
     * @return bool|null
     */
    public function checkDataForEdit(array $data = [])
    {
        if (isset($data['title']) && isset($data['lead'])) {
            if (isset($data['id'])) {
                return true;
            }
            return false;
        }
        return null;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function checkDataForDelete(array $data = [])
    {
        return isset($data['id']) ?: false;
    }
}