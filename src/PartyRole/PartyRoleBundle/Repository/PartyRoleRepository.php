<?php
/**
 * File: PartyRoleRepository.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRole
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRole\PartyRoleBundle\Repository;

use PartyRole\PartyRoleBundle\Core\RepositoryCore;

/**
 * Class PartyRoleRepository
 *
 * @category Api_Rest_Implementation
 * @package  PartyRole\PartyRoleBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRoleRepository extends RepositoryCore
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
/* End of file PartyRoleRepository.php */
