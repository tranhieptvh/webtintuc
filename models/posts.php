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
        $stm = $this->db->prepare('SELECT * FROM ' . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function getAllLimit($offset, $count)
    {
        $stm = $this->db->prepare('SELECT ' . self::tableName . '.id AS id, title, ' . self::tableName . '.avatar, date_created, username, category.name AS cate_name, category.id AS cate_id 
        FROM ' . self::tableName . ' 
        INNER JOIN category ON posts.cate_id = category.id 
        INNER JOIN users ON posts.created_by_id = users.id 
        ORDER BY ' . self::tableName . '.id DESC
        LIMIT ' . $offset . ',' . $count);
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
        $this->db->query('DELETE FROM ' . self::tableName . ' WHERE id = ' . $id);
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
        $rows = $this->db->query('SELECT * FROM ' . self::tableName . ' WHERE id=' . $id);
        foreach ($rows as $r) {
            // $row  = $r;
        }
        return $r;
    }

    function getDetailById($id)
    {
        $rows = $this->db->query('SELECT ' . self::tableName . '.id AS id, title, ' . self::tableName . '.avatar, tag_id, description, content, date_created, views, username, fullname, category.name AS cate_name, category.id AS cate_id 
        FROM ' . self::tableName . ' 
        INNER JOIN category ON posts.cate_id = category.id 
        INNER JOIN users ON posts.created_by_id = users.id 
        WHERE ' . self::tableName . '.id=' . $id);
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }

    function getCount()
    {
        $row = $this->db->query('select count(*) as count from ' . self::tableName);
        foreach ($row as $r) {
            $count = $r['count'];
        }
        return $count;
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

    function getPostsFeatureLimit($offset, $count)
    {
        $stm = $this->db->prepare('SELECT ' . self::tableName . '.id, title, avatar, date_created, category.name AS cate_name, cate_id 
        FROM ' . self::tableName . ' 
        INNER JOIN category 
        ON ' . self::tableName . '.cate_id = category.id 
        WHERE is_featured=1 
        ORDER BY id DESC 
        LIMIT ' . $offset . ',' . $count);
        $stm->execute();
        return $stm->fetchAll();
    }

    function getPostsViews()
    {
        $stm = $this->db->prepare('SELECT ' . self::tableName . '.id, title, avatar, date_created, category.name AS cate_name, cate_id 
        FROM ' . self::tableName . ' 
        INNER JOIN category 
        ON ' . self::tableName . '.cate_id = category.id 
        ORDER BY views DESC LIMIT 0,5');
        $stm->execute();
        return $stm->fetchAll();
    }

    function getPostsByParentCategoryLimit($id, $offset, $count)
    {
        $stm = $this->db->prepare('SELECT ' . self::tableName . '.id, title, avatar, date_created, category.name AS cate_name, cate_id 
        FROM ' . self::tableName . ' 
        INNER JOIN category 
        ON ' . self::tableName . '.cate_id = category.id 
        WHERE ' . self::tableName . '.cate_id=' . $id . ' OR category.parent_id=' . $id . ' 
        ORDER BY ' . self::tableName . '.id DESC 
        LIMIT ' . $offset . ',' . $count);
        $stm->execute();
        return $stm->fetchAll();
    }

    function getPostsByParentCategory($id)
    {
        $stm = $this->db->prepare('SELECT * FROM ' . self::tableName . ' 
        INNER JOIN category 
        ON ' . self::tableName . '.cate_id = category.id 
        WHERE ' . self::tableName . '.cate_id=' . $id . ' OR category.parent_id=' . $id . ' 
        ORDER BY ' . self::tableName . '.id DESC');
        $stm->execute();
        return $stm->fetchAll();
    }

    function getPostsByCategory($id)
    {
        $stm = $this->db->prepare(' SELECT * FROM ' . self::tableName . ' WHERE cate_id=' . $id);
        $stm->execute();
        return $stm->fetchAll();
    }

    function getPostsByCategoryLimit($id, $offset, $count)
    {
        $stm = $this->db->prepare('SELECT ' . self::tableName . '.id, title, avatar, date_created, category.name AS cate_name, cate_id 
        FROM ' . self::tableName . ' 
        INNER JOIN category ON category.id =' . self::tableName . '.cate_id  
        WHERE cate_id=' . $id . ' 
        LIMIT ' . $offset . ',' . $count);
        $stm->execute();
        return $stm->fetchAll();
    }

    function getPostsByTag($id)
    {
        $stm = $this->db->prepare('SELECT * FROM ' . self::tableName . ' 
        WHERE FIND_IN_SET(' . $id . ',tag_id)!=0');
        $stm->execute();
        return $stm->fetchAll();
    }

    function getPostsByTagLimit($id, $offset, $count)
    {
        $stm = $this->db->prepare('SELECT * FROM ' . self::tableName . ' 
        WHERE FIND_IN_SET(' . $id . ',tag_id)!=0  
        LIMIT ' . $offset . ',' . $count);
        $stm->execute();
        return $stm->fetchAll();
    }

    function updateViews($id)
    {
        $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
        SET views = views + 1 
        WHERE id=' . $id);
        $stm->execute();
    }

    function searchPosts($keyword)
    {
        $stm = $this->db->prepare('SELECT ' . self::tableName . '.id, title, avatar, date_created, category.name AS cate_name, cate_id 
        FROM ' . self::tableName . ' 
        INNER JOIN category 
        ON ' . self::tableName . '.cate_id = category.id 
        WHERE title LIKE "%' . $keyword . '%"');
        $stm->execute();
        return $stm->fetchAll();
    }
}
