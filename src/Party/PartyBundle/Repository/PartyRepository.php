<?php
/**
 * File: PartyRepository.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Party
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace Party\PartyBundle\Repository;

use Party\PartyBundle\Core\RepositoryCore;

/**
 * Class PartyRepository
 *
 * @category Api_Rest_Implementation
 * @package  Party\PartyBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRepository extends RepositoryCore
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
/* End of file PartyRepository.php */
