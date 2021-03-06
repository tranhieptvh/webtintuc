<?php
require_once('./../db.php');
require_once('imodel.php');

class Users extends DB implements IModel
{
    const tableName = 'users';
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
            $username = $payload['username'];
            $password = $payload['pwd'];
            $role = $payload['role'];
            $fullname = $payload['fullname'];
            $dob = $payload['dob'];
            $gender = $payload['gender'];
            $email = $payload['email'];
            $phone = $payload['phone'];
            $address = $payload['address'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(username,pwd,role,fullname,dob,gender,email,phone,address)
             VALUES(:username, :pwd, :role, :fullname, :dob, :gender, :email, :phone, :address)');
            $stm->execute(array(
                ':username' => $username,
                ':pwd' => md5($password),
                ':role' => $role,
                ':fullname' => $fullname,
                ':dob' => $dob,
                ':gender' => $gender,
                ':email' => $email,
                ':phone' => $phone,
                ':address' => $address
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $this->db->lastInsertId();
    }

    function register($payload)
    {

        try {
            $username = $payload['username'];
            $password = $payload['pwd'];
            $fullname = $payload['fullname'];
            $email = $payload['email'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(username,pwd,fullname,email)
             VALUES(:username, :pwd, :fullname, :email)');
            $stm->execute(array(
                ':username' => $username,
                ':pwd' => md5($password),
                ':fullname' => $fullname,
                ':email' => $email
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
            $role = $payload['role'];
            $fullname = $payload['fullname'];
            $dob = $payload['dob'];
            $gender = $payload['gender'];
            $email = $payload['email'];
            $phone = $payload['phone'];
            $address = $payload['address'];

            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET role = :role, fullname = :fullname, dob = :dob, gender = :gender, email = :email, phone = :phone, address = :address WHERE id = :id');
            $stm->execute(array(
                ':id' => $id,
                ':role' => $role,
                ':fullname' => $fullname,
                ':dob' => $dob,
                ':gender' => $gender,
                ':email' => $email,
                ':phone' => $phone,
                ':address' => $address
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

    function getByRole($role)
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " WHERE role= $role");
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

    function change_pwd($pwd, $id)
    {
        try {
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET pwd = :pwd WHERE id = :id');
            $stm->execute(array(
                ':id' => $id,
                ':pwd' => md5($pwd)
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    function getCount()
    {
        $row = $this->db->query('select count(*) as count from ' . self::tableName);
        foreach ($row as $r) {
            $count = $r['count'];
        }
        return $count;
    }

    function checkUsername($username)
    {
        $stm = $this->db->prepare('SELECT * FROM ' . self::tableName . ' WHERE username = :username');
        $stm->execute(array(':username' => $username));
        $users = $stm->fetchAll();
        if (count($users) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
