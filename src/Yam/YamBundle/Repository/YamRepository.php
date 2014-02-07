<?php
/**
 * File: YamRepository.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Yam
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yam\YamBundle\Repository;

use Yam\YamBundle\Core\RepositoryCore;

/**
 * Class YamRepository
 *
 * @category Api_Rest_Implementation
 * @package  Yam\YamBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YamRepository extends RepositoryCore
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
/* End of file YamRepository.php */
