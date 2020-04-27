<?php
require_once('./../db.php');
require_once('imodel.php');

class Posts extends DB implements IModel
{
    const tableName = 'posts';
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
        $stm = $this->db->prepare("SELECT " . self::tableName . ".id, title, " . self::tableName . ".avatar, username, name 
        FROM " . self::tableName . " 
        INNER JOIN category ON posts.cate_id = category.id 
        INNER JOIN users ON posts.created_by_id = users.id 
        LIMIT $offset,$count");
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $title = $payload['title'];
            $description = $payload['description'];
            $content = $payload['content'];
            $created_by_id = $payload['created_by_id'];
            $tag_id = $payload['tag_id'];
            $cate_id = $payload['cate_id'];
            $is_featured = $payload['is_featured'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(title, description,content, created_by_id, tag_id, cate_id, is_featured)
             VALUES(:title, :description, :content, :created_by_id, :tag_id, :cate_id, :is_featured)');
            $stm->execute(array(
                ':title' => $title,
                ':description' => $description,
                ':content' => $content,
                ':created_by_id' => $created_by_id,
                ':tag_id' => $tag_id,
                ':cate_id' => $cate_id,
                ':is_featured' => $is_featured
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $this->db->lastInsertId();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE id = " . $id);
    }

    function update($payload)
    {
        try {
            $id = $payload['id'];
            $title = $payload['title'];
            $description = $payload['description'];
            $content = $payload['content'];
            $created_by_id = $payload['created_by_id'];
            $tag_id = $payload['tag_id'];
            $cate_id = $payload['cate_id'];
            $is_featured = $payload['is_featured'];

            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET title= :title, description = :description, content = :content, created_by_id = :created_by_id, tag_id = :tag_id, is_featured = :is_featured, cate_id = :cate_id
            WHERE id = :id');
            $stm->execute(array(
                ':id' => $id,
                ':title' => $title,
                ':description' => $description,
                ':content' => $content,
                ':created_by_id' => $created_by_id,
                ':tag_id' => $tag_id,
                ':cate_id' => $cate_id,
                ':is_featured' => $is_featured
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

    function getByCategory($cate_id)
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " WHERE cate_id= $cate_id");
        $stm->execute();
        return $stm->fetchAll();
    }

    function updateAvatar($path, $id)
    {
        try {
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET avatar = :avatar WHERE id = :id');
            $stm->execute(array(':avatar' => $path, ':id' => $id));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
