<?php
require_once('./../db.php');
require_once('imodel.php');

class Tags extends DB implements IModel
{
    const tableName = 'tags';
    public function __construct()
    {
        parent::__construct();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getAll()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function getAllLimit($offset, $count)
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " LIMIT $offset,$count");
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $name = $payload['name'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(name) VALUES(:name)');
            $stm->execute(array(
                ':name' => $name
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE id = " . $id);
    }

    function update($payload)
    {
        try {
            $id = $payload['id'];
            $name = $payload['name'];

            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET name = :name WHERE id = :id');
            $stm->execute(array(
                ':id' => $id,
                ':name' => $name
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    function getById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }

    function getCount(){
        $row = $this->db->query('select count(*) as count from ' . self::tableName);
        foreach ($row as $r) {
            $count = $r['count'];
        }
        return $count;
    }

    function checkName($name)
    {
        $stm = $this->db->prepare('SELECT * FROM ' . self::tableName . ' WHERE name = :name');
        $stm->execute(array(':name' => $name));
        $users = $stm->fetchAll();
        if (count($users) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
