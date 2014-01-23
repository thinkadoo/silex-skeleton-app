<?php
/**
 * File: user_password.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Todo
 * @author   Andre Venter <aventer@iteonline.co.za>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Todo\TaskBundle\Repository;

use Todo\TaskBundle\Core\RepositoryCore;
/**
 * Class ItemRepository
 *
 * @category Api_Rest_Implementation
 * @package  Todo\TaskBundle\Core
 * @author   Andre Venter <aventer@iteonline.co.za>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class ItemRepository extends RepositoryCore
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