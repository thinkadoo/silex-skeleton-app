<?php
/**
 * File: YooRepository.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Yoo
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yoo\YooBundle\Repository;

use Yoo\YooBundle\Core\RepositoryCore;

/**
 * Class YooRepository
 *
 * @category Api_Rest_Implementation
 * @package  Yoo\YooBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YooRepository extends RepositoryCore
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
/* End of file YooRepository.php */
