<?php
/**
 * File: AdminRepository.php
 *
 * PHP Version 5.3.18
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Admin
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Admin\AdminBundle\Repository;

use Admin\AdminBundle\Core\RepositoryCore;
/**
 * Class AdminRepository
 *
 * @category Api_Rest_Implementation
 * @package  Admin\AdminBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class AdminRepository extends RepositoryCore
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

    $params['updated_at'] = date("Y-m-d H:i:s");

    return $this->db->insert($this->table, $params);
    }
}
/* End of file AdminRepository.php */