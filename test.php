<?php
<?php
class connection
{
    public $connent;
    public function __construct()
    {   
        try{
        $this->$connent= new pdo("mysql:host=localhost;dbname=test","root","");
        $this ->$connent->setAttribute(pdo::ATTR_default_fetch_mode,pdo::fetch_assoc);
        }
        catch(throwable $i){
            die($i -> getmessage())
        }

    }
    public function getdata($colums ="*",$table ,$connent=true);//default
    {
        $query="select $colums from $table where $connent";
        $data=$this ->$connent->prepare($query);
        $data->execute($query);
        return $data ->fetchall();

    }
    public function insert($colums,$table,$data)
    {
        foreach($colums as $colum){
            $x=[$colum]
        }
        $query="insert into $table ($colums) value ($data)";
        $data=$this ->$connent->prepare($query);
        $data->execute($query);
        return $data ->fetchall();

    }
    public function update($colums,$table,$data,$connent=true)
    {
        foreach ($data as $key => $val) {
            $d[] = "`$key` = '$val'";
        }
        $info = implode(', ', $d);
        $query = "UPDATE $table SET $info WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();

    }
    public  function deleteData($table, $condition = true)
    {
        $query = "DELETE FROM $table WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }
}

$user = new connection;
echo "<pre>";
$user->deleteData("users");