<?php
require_once('./../db.php');
require_once('imodel.php');

class Comments extends DB implements IModel
{
    const tableName = 'comments';
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
            $created_by_id = $payload['created_by_id'];
            $content = $payload['content'];
            $post_id = $payload['post_id'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(created_by_id,content,post_id) VALUES(:created_by_id,:content,:post_id)');
            $stm->execute(array(
                ':created_by_id' => $created_by_id,
                ':content' => $content,
                ':post_id' => $post_id
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
            $content = $payload['content'];

            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET content = :content WHERE id = :id');
            $stm->execute(array(
                ':id' => $id,
                ':content' => $content
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

    function getByPostId($id)
    {
        $stm = $this->db->prepare('SELECT ' . self::tableName . '.id, ' . self::tableName . '.content, ' . self::tableName . '.date_update, username, avatar 
        FROM ' . self::tableName . ' 
        INNER JOIN users ON users.id = ' . self::tableName . '.created_by_id  
        WHERE post_id=' . $id . ' 
        ORDER BY ' . self::tableName . '.id DESC');
        $stm->execute();
        return $stm->fetchAll();
    }
}
