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
namespace Todo\TaskBundle\Core;
/**
 * Class RepositoryCore
 *
 * @category Api_Rest_Implementation
 * @package  Todo\TaskBundle\Core
 * @author   Andre Venter <aventer@iteonline.co.za>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class RepositoryCore
{
    protected $db;

    protected $table;

    /**
     * setDB
     *
     * @param Object $db database injected
     *
     * @return void
     */
    public function setDB($db)
    {
        $this->db = $db;
    }
    /**
     * setTable
     *
     * @param String $table table to manipulate
     *
     * @return void
     */
    public function setTable($table)
    {
        $this->table = $table;
    }
    /**
     * constructor
     *
     * @param Object $db database injected
     *
     * @return void
     */
    public function __construct($db)
    {
        $this->setDB($db);

        $calledClass = explode('\\', get_called_class());
        $class = end($calledClass);

        $table = strtolower(substr($class, 0, -10));
        $this->setTable($table);
    }
    /**
     * findAll
     *
     * @return mixed
     */
    public function findAll()
    {
        $sql = "SELECT * FROM `$this->table`";
        $items = $this->db->fetchAll($sql);

        return $items;
    }
    /**
     * find
     *
     * @param string $id the record id in the table
     *
     * @return mixed
     */
    public function find($id)
    {
        $sql = "SELECT * FROM `$this->table` WHERE `id` = $id";
        $item = $this->db->fetchAssoc($sql);

        return $item;
    }
    /**
     * delete
     *
     * @param string $id the record id in the table
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }
    /**
     * insert
     *
     * @param array $params the parameters sent to rest api
     *
     * @return mixed
     */
    public function insert($params)
    {
        return $this->db->insert($this->table, $params);
    }

    /**
     * update
     *
     * @param string $id     the record id in the table
     * @param array  $params the parameters sent to rest api
     *
     * @return mixed
     */
    public function update($id, $params)
    {
        return $this->db->update($this->table, $params, array('id' => $id));
    }
}
/* End of file RepositoryCore.php */