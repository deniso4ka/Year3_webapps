<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 25/04/2016
 * Time: 11:55
 */

namespace Itb\Model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * My Database Table
 * Class MyDatabaseTable
 * @package Itb\Model
 */
class MyDatabaseTable  extends DatabaseTable
{
    /**
     * searching id by column name
     * @param $columnName
     * @param $id
     * @return array
     */
    public static function searchIdByColumn($columnName, $id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from ' . static::getTableName()  . ' WHERE ' . $columnName . ' =:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        $objects = $statement->fetchAll();

        return $objects;
    }
}
