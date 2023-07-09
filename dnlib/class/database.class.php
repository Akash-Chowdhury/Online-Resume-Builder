<?php

class Database{
    private $connection;
    function __construct(){
       try{
        $this->connection=new mysqli('localhost', 'root', '', 'cv');
        //$this->connection=new mysqli('sql211.infinityfree.com', 'if0_34364246', 'Akash2001@', 'if0_34364246_resume');
       }catch(Exception $e)
       { 
        echo $e->getMessage();
       }
    }

    private function getBindParamsDataType($data){
        $dt='';
        foreach ($data as $value) {
            # code...
            if (is_float($value)) {
                # code...
                $dt.='d';
            }
            elseif (is_integer($value)) {
                # code...
                $dt.='i';
            }
            elseif (is_string($value)) {
                # code...
                $dt.='s';
            }
            else {
                # code...
                $dt.='b';
            }
            
        }
        return $dt;
    }

    private function getLabels($values){
        $lable="";
        foreach($values as $value){
            $lable.='?,';
        }
        $lable=substr_replace($lable,'',-1);
        return $lable;
    }
    private function getLabelswithname($columns){
        $lable="";
        $columns=explode(',',$columns);
        foreach($columns as $column){
            $lable.=$column.'=?,';
        }
        $lable=substr_replace($lable,'',-1);
        return $lable;
    }


public function clean($data){
    return $this->connection->real_escape_string($data);
}


    //insert

    public function insert($table, $columns, $values){

          
        $lable=$this->getLabels($values);
        $query="INSERT INTO $table($columns) VALUES($lable)";
        $obj=$this->connection->prepare($query);
        $obj->bind_param($this->getBindParamsDataType($values),...$values);
        $obj->execute();
    }


    //update 

    public function update($table, $columns, $values, $condition){

          
        $lable=$this->getLabelswithname($columns);
        $query="UPDATE $table SET $lable WHERE $condition";
        $obj=$this->connection->prepare($query);
        $obj->bind_param($this->getBindParamsDataType($values),...$values);
        return $obj->execute();
    }
  

 
    public function read($table, $columns = '*', $conditions = ''){
        $query = "SELECT $columns FROM $table $conditions";
        $result = $this->connection->query($query);
    
        if ($result === false) {
            echo "Error: " . $this->connection->error;
            return;
        }
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        $result->close();
    
        return $data;
    }
    
    
    

    //delete

    
    public function delete($table, $conditions){
        $query="DELETE FROM $table WHERE $conditions";
        return $this->connection->query($query);
    }
}

?>