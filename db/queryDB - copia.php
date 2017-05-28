<?php

class db
{
    //constructor de la clase$server,$userDB,$passUdb,$db
    public function tables($table)
    {
        $this->dbConnect();
        $sql = "SHOW COLUMNS FROM " . $table;
        $result = $this->dbConnect->query($sql);
        $count = $result->num_rows;
        $rows = array();
        for ($i = 1; $i <= $count; $i++) {
            $row = mysqli_fetch_row($result);
            $result->data_seek($i);
            $rows[$i]['column'] = $row[0];
            $rows[$i]['type'] = $row[1];
            $rows[$i]['key'] = $row[3];
        }
        return $rows;
    }

    public function dbConnect()
    {
        require('AccessDB.class.php');
        $this->dbConnect = new mysqli($server, $userDB, $passUdb, $DB);
    }

    public function fk($table)
    {
        $this->dbConnect();
        $sql = "SELECT TABLE_NAME,COLUMN_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM 
		INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME = '" . $table . "' and REFERENCED_TABLE_NAME IS NOT NULL";
        //var_dump($sql);
        $result = $this->dbConnect->query($sql);
        $row = mysqli_fetch_row($result);

        if ($row != false) {

            $count = $result->num_rows;
            $rows = array();
            for ($i = 0; $i < $count; $i++) {

                $row = mysqli_fetch_row($result);
                $result->data_seek($i);
                $rows[$i] = $row;
            }
            return $rows;
        } else {
            return false;
        }
        $result->close();

        return $rows;
    }

    //Guardar nuevos datos en la base de datos
    public function insert($table, $columns, $options)
    {
        $this->dbConnect();
        $sql = "INSERT INTO " . $table . " (" . $columns . ") 
		VALUES (" . $options . ")";
        //var_dump($sql);
        if ($this->dbConnect->query($sql) === False) {
            return false;
        } else {
            return true;
        }
        $result->close();
    }

    //Serch en una tabla
    public function serch($table, $columns, $condition, $print)
    {
        $this->dbConnect();
        $sql = "SELECT " . $columns . " FROM " . $table . " WHERE " . $condition . " ORDER BY 1 DESC";
        //var_dump($sql);
        $result = $this->dbConnect->query($sql);
        $count = $result->num_rows;
        if ($count > 0) {
            if ($print == True) {
                $column = explode(',', $columns);
                $rows = array();
                for ($i = 1; $i <= $count; $i++) {
                    $row = mysqli_fetch_row($result);
                    $result->data_seek($i);
                    $con = 0;
                    while ($con < count($column)) {
                        $columna = $column[$con];
                        $rows[$i][$columna] = $row[$con];
                        $con++;
                    }
                }
                return $rows;
            } else {
                return true;
            }
        } else {
            return false;
        }
        $result->close();
    }

    public function update($table, $campos, $options)
    {
        $sql = "UPDATE " . $table . " SET " . $campos . " WHERE " . $options;
        if ($this->dbConnect->query($sql) === False) {
            echo 'Update ' . $options . ' in ' . $columns . ' in ' . $table . '</br>';
        } else {
            return $result = 1;
        }
    }

    //Borrar datos  de la base de datos
    public function deleted($table, $columns, $options)
    {
        for ($i = 0; $i < count($options); $i++) {
            $sql = "DELETE FROM " . $table . " WHERE " . $columns . " = '" . $options . "'";
            if ($this->dbConnect->query($sql) === TRUE) {
                if (mysqli_affected_rows($this->conexion)) {
                    echo $options[$i] . "deleted" . "</br>";
                } else {
                    echo $options[$i] . "don´t deleted" . $this->conexion->error . "</br>";
                }
            }
        }
    }

    //crear tablas
    public function newTable($table)
    {
        //generar Sql
        $sql = "CREATE TABLE IF NOT EXISTS `" . $table . "` 
		(`ID` int(11) NOT NULL,PRIMARY KEY (`ID`)) 
		ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        //fin Sql
        if ($this->dbConnect->query($sql) === TRUE) {
            echo "New table successful";
        } else {
            echo "New table error " . $this->conexion->error;
        }
    }

    //add campos a una tabla
    public function addColumns($table, $column)
    {
        $sql = "ALTER TABLE " . $table . " ADD " . $column . " CHAR(30)";
        if ($this->dbConnect->query($sql) === TRUE) {
            if ($this->dbConnect->query($sql) === TRUE) {
                echo 'Add columns' . $table;
            } else {
                echo 'error Add columns' . $table;
            }
        }
    }

    //Delete campos a una tabla
    public function deleteColumns($table, $column)
    {
        $sql = "ALTER TABLE " . $table . " DROP " . $column;
        if ($this->dbConnect->query($sql) === TRUE) {
            echo 'delete columns ' . $table;
        } else {
            echo 'error delete columns ' . $table;
        }
    }
}

?>
