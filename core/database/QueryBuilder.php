<?php
class QueryBuilder{
    protected $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    //从指定的表中获取全部内容
    public function selectAll($table){
        $statement=$this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_BOTH);
    }

    public function insert($table,$parameters){
        //$sql=>INSERT INTO $table (name) VALUES (:name)
        //这里使用pdo的预处理语句进行插入操作
        $sql=sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,implode(',',array_keys($parameters)),':'.
            implode(',:',array_keys($parameters))
        );

        try{
            $statement=$this->pdo->prepare($sql);
            $statement->execute($parameters);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

}