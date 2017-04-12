<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';

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

}