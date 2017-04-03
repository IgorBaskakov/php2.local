<?php

namespace App\Models;

use App\GetterSetter;

require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * @package App\Models
 * @property string $title
 * @property string $lead
 */
class Article extends Model
{
    use GetterSetter;

    protected const TABLE = 'news';

    public $title;
    public $lead;

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
                return Author::findById($this->author_id);
            }
        }
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
    }

}