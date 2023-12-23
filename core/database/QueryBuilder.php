<?php

class QueryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from $table");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($dataArr, $tableName)
    {
        $getDataKeys = array_keys($dataArr);
        $cols = implode(',', $getDataKeys);
        $questionMark = '';
        foreach ($getDataKeys as $key) {
            $questionMark .= '?,';
        }
        $questionMark = rtrim($questionMark, ',');
        $sql = "insert into $tableName ($cols) values ($questionMark)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array_values($dataArr));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($dataArr, $tableName, $id)
    {
        $getDataKeys = array_keys($dataArr);
        $questionMark = '';
        foreach ($getDataKeys as $key) {
            $questionMark .= "$key=?,";
        }
        $questionMark = rtrim($questionMark, ',');
        $sql = "update $tableName set $questionMark where id=?";
        $statement = $this->pdo->prepare($sql);
        $dataVal = array_values($dataArr);
        $dataVal[] = $id;
        $statement->execute($dataVal);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($tableName, $key, $val)
    {
        $sql = "delete from $tableName where $key=?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$val]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
