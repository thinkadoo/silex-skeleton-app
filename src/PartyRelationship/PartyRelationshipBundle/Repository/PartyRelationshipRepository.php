<?php
/**
 * File: PartyRelationshipRepository.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRelationship
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRelationship\PartyRelationshipBundle\Repository;

use PartyRelationship\PartyRelationshipBundle\Core\RepositoryCore;

/**
 * Class PartyRelationshipRepository
 *
 * @category Api_Rest_Implementation
 * @package  PartyRelationship\PartyRelationshipBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRelationshipRepository extends RepositoryCore
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
/* End of file PartyRelationshipRepository.php */
