<?php
/**
 * File: UserRepository.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_User
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace User\UserBundle\Repository;

use User\UserBundle\Core\RepositoryCore;

/**
 * Class UserRepository
 *
 * @category Api_Rest_Implementation
 * @package  User\UserBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class UserRepository extends RepositoryCore
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
        return $this->db->insert($this->table, $params);
    }
}
/* End of file UserRepository.php */
