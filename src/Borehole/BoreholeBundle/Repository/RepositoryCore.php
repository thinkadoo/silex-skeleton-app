<?php
/**
 * File: BoreholeRepository.php
 *
 * PHP Version 5.3.18
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Borehole
 * @author   Andre Venter <andre.n.venter@gmail.com>
* @license  Thinkadoo http://think-a-doo.net
* @link     https://github.com/thinkadoo/silex-skeleton-rest.git
*/
namespace Borehole\BoreholeBundle\Core;

use Borehole\BoreholeBundle\Core\RepositoryCore;
/**
* Class BoreholeRepository
*
* @category Api_Rest_Implementation
* @package  Borehole\BoreholeBundle\Core
* @author   Andre Venter <andre.n.venter@gmail.com>
* @license  Thinkadoo http://think-a-doo.net
* @link     https://github.com/thinkadoo/silex-skeleton-rest.git
*/
class BoreholeController 
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
/* End of file BoreholeRepository.php */