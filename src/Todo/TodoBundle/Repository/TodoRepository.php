<?php
/**
 * File: TodoRepository.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Todo
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Todo\TodoBundle\Repository;

use Todo\TodoBundle\Core\RepositoryCore;
/**
 * Class ItemRepository
 *
 * @category Api_Rest_Implementation
 * @package  Todo\TodoBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class TodoRepository extends RepositoryCore
{
    /**
     * insert
     *
     * @param array $params parameters passed to rest api
     *
     * @return mixed
     */
    public function insert($params)
    {
        $params['created'] = date("Y-m-d H:i:s");

        return $this->db->insert($this->table, $params);
    }
}
/* End of file ItemRepository.php */