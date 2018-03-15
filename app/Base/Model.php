<?php

namespace App\Base;

class Model
{
    public $connection = null;

    protected $dbname = null;

    protected $table = null;

    /**
     * Model constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->connection = DBConnection::instance()->getConnection("mysql:host=localhost;dbname={$this->dbname}", 'root', '');
    }

    /**
     * @throws \Exception
     */
    public static function all()
    {
        $model = new static();

        $getUsers = $model->connection->prepare("SELECT * FROM {$model->table} ORDER BY id ASC");

        $getUsers->execute();

        $users = $getUsers->fetchAll();

        return $users;
    }

    /**
     * Find by id
     *
     * @param string $column
     * @param $val
     * @return null
     * @throws \Exception
     */
    public static function find($id)
    {
        $model = new static();

        $getUsers = $model->connection->prepare("SELECT * FROM {$model->table} WHERE id='$id' ");

        $getUsers->execute();

        $users = $getUsers->fetchAll();

        return $users;
    }

    /**
     * @param string $email
     * @param array $attributes
     * @return bool
     */
    public static function update($user, array $attributes = [])
    {


            $model = new static();

            $username = $user['username'];
            $email = $user['email'];
            $id=$user['id'];

            $getUsers = $model->connection->prepare("UPDATE    users  SET username=:uname,email=:email    WHERE id=:qid");
            $getUsers->execute([
                "uname" => $username,
                "email" => $email,
                "qid"=>$id
            ]);

            return true;

    }

    /**
     * @param $email
     * @return bool
     */
    public static function delete($id)
    {


       $data=$id->all();

       $id=$data['id'];

        $model = new static();

        $getUsers = $model->connection->exec("DELETE FROM users WHERE id='$id'");



//        $users = $getUsers->fetchAll();

        return  $getUsers ;
    }


    /**
     * @param array $options
     * @return bool
     * @throws \Exception
     */
    public static function save(array $options = [])
    {
        try{
            $model = new static();

            $username = $options['username'];
            $email = $options['email'];

            $getUsers = $model->connection->prepare("INSERT INTO users(username, email) VALUES(:uname, :email)");
            $getUsers->execute([
                "uname" => $username,
                "email" => $email,
            ]);

            return true;
        }catch (\Exception $exception) {
            return false;
        }
    }
}
