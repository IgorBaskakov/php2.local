<?php

namespace App\Models;

/**
 * Class Article
 * @package App\Models
 * @property string $title
 * @property string $lead
 */
class Article extends Model
{

    protected const TABLE = 'news';

    /** @var int Should contain a author_id */
    protected $author_id;

    /**
     * @param string $name
     * @return object
     */
    public function __get($name)
    {
        if ('author' === $name) {
            if (isset($this->author_id)) {
                $this->data['author'] = Author::findOneById($this->author_id);
                return $this->data['author'];
            }
        }
        return $this->data[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        if ('author' === $name) {
            return isset($this->author_id);
        }
        return isset($this->data[$name]);
    }

    public function setTitle(string $data)
    {
        if ('' == trim($data)) {
            throw new \Exception('Заголовок новости должен быть заполнен');
        }
        $this->data['title'] = $data;
    }

    public function setLead(string $data)
    {
        if ('' == trim($data)) {
            throw new \Exception('Содержание новости должно быть заполнено');
        }
        $this->data['lead'] = $data;
    }

}