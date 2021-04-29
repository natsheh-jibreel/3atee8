<?php
include 'dbManager.php';

class dbModel{
    private $_dbManager;
    private $_dbTable = null;
    public $_fields = [];

    public function __construct() {
        $this->_dbManager = new dbManager();
    }

    public static function create($fieldsValuesDict=[]){
        $model = new dbModel();
        return $model;
    }

    public function get($criterias){
        # Basic select statement.
        $sql = "SELECT * FROM {$this->_dbTable}";

        # If any criteria are passed.
        if (count($criterias) > 0){
            $sql .= " WHERE ";
            # Create the conditions segment.
            $conditions = array();
            foreach ($criterias as $field => $value){
                $conditions[] = " {self._dbTable}.{field} = {value} ";
            }

            for ($i = 0; $i < count($conditions); $i++){
                if($i == count($conditions)-1){
                    $sql .= $c;
                }else{
                    $sql .= $c . "AND";
                }
                
            }
        }

        # Execute the query and get the result set.
        $resultSet = $this->_dbManager.executeSelectQuery($sql);
        $records = array();

        while ($row = mysql_fetch_assoc($resultSet)) {
            $record = $this->create($criterias);
            for($i = 0; $i < count($this->_fields); $i++){
                $record->_fields[i] = $row[i];
            }
            $records[] = $record;
        }

        mysql_free_result($resultSet);

        return records;
    }
        
    public static function getFirst($criteria=[]){
        # Basic select statement.
        $sql = "SELECT * FROM {$this->_dbTable}";

        # If any criteria are passed.
        if (count($criterias) > 0){
            $sql .= " WHERE ";
            # Create the conditions segment.
            $conditions = array();
            foreach ($criterias as $field => $value){
                $conditions[] = " {self._dbTable}.{field} = {value} ";
            }

            for ($i = 0; $i < count($conditions); $i++){
                if($i == count($conditions)-1){
                    $sql .= $c;
                }else{
                    $sql .= $c . "AND";
                }
                
            }
            $sql .= "LIMIT 1";
        }

        # Execute the query and get the result set.
        $resultSet = $this->_dbManager.executeSelectQuery($sql);
        # Create an empty object of the caller.
        $record = $this->create();

        if(count($resultSet)>0){
            # Read the first row.
            $row = mysql_fetch_assoc($resultSet);
            mysql_free_result($resultSet);
            for($i = 0; $i < count($this->_fields); $i++){
                $record->_fields[i] = $row[i];
            }
        }
        return $record;
    }
        
    public function exists($wrtField="id"){
        $value = $this->$wrtField;
        $records = $this->get([$wrtField=> $value]);
        return count($records) > 0;
    }
        
    public function save($wrtField="id"){
        # Default result of the function.
        $result = True;
        # List of fields that will be used in insertion or update.
        $fieldsToAffect = $this->_fields;
        # Remove the ID because it should normally be auto-incremented, and is rarely updated.
        $key = array_search("id", $fieldsToAffect);
        if (false !== $key)
        {
            array_splice($fieldsToAffect, $key, 1);
        }

        # If the record exists, update.
        if($this->exists($wrtField)){
            # Also remove the wrtField from the update list because it won't be updated, we rather use it as a ref.
            $key = array_search($wrtField, $fieldsToAffect);
            if (false !== $key)
            {
                array_splice($fieldsToAffect, $key, 1);
            }

            # If we still have fields to update.
            if(count($fieldsToAffect) > 0){
                $sql = "UPDATE {$this->_dbTable} SET ";

                # Loop over the fields to update them.
                foreach($fieldsToAffect as $field){
                    $value = $this->getSqlValue($this->$field);
                    $sql .= "'{$field}' = {$value}, ";
                }
                    

                # Get rid of the last comma.
                $sql = substr($sql, 0, -2);

                # Add the condition with respect to the wrtField.
                $wrtValue = $this->$wrtField;
                $sql += " WHERE '{$wrtField}' = '{$wrtValue}'";

                $result = $this->_dbManager->execute($sql);
            }
            # Reload the fields values from the database.
            $this->refresh($wrtField);
        }

        # Otherwise, create a new record.
        else{
            for ($i = 0; $i < count($fieldsToAffect); $i++)
                $fieldsToAffect[i] = "'" . $fieldsToAffect[i] . "'";

            $sql = "INSERT INTO {$this->_dbTable} ({join(', ', $fieldsToAffect)})";
            # Add the values-clause.
            $sql .= " VALUES (";

            # Add the value of all fields to be inserted.
            foreach ($fieldsToAffect as $field){
                $attribute = str_replace("'", "", $field);
                $value = $this->getSqlValue($this->$attribute);
                $sql .= "{$value}, ";
            }
                

            # Get rid of the last comma and add a closing parenthesis.
            $sql = substr($sql, 0, -2) . ")";

            # Execute the insert, and update the record id.
            $recordId = $this->_dbManager->execute($sql);
            $this->id = $recordId;
            $result = $recordId > 0;
        }
    
        return $result;
    }
        
    public function refresh($wrtField){
        $result = False;
        # The reference value to retrieve the record.
        $wrtValue = $this->$wrtField;
        # Get the records, usually should be one record.
        $records = $this.get([wrtField => wrtValue]);

        # Make sure the result set is not empty.
        if (count($records) > 0){
            # Set the result to true.
            $result = True;

            # Update the fields of the calling object.
            foreach($this->_fields as $field){
                $value = records[0][$field];
                $this->$field =  $value;
            }
        }    

        return $result;
    }
              
    public function delete($wrtField="id"){
        # The reference value to retrieve the records.
        $value = $this->$wrtField;
        # Query to delete the records.
        $sql = "DELETE FROM '{$this->_dbTable}' WHERE {$wrtField} = '{$value}'";
        # Execute query and get the result.
        $result = $this->_dbManager->execute($sql);

        return $result;
    }
        
    public static function getSqlValue($rawValue){
        $sqlValue = Null;

        if ($rawValue == Null)
            $sqlValue = NULL;
        elseif ($rawValue == True)
            $sqlValue = "1";
        elseif ($rawValue == False)
            $sqlValue = "0";
        else
            $sqlValue = "'" + $this->handleSpecialChars(rawValue) + "'";

        return $sqlValue;
    }
       
    public static function handleSpecialChars($value){
        $text = $value;
        $text = str_replace("\"", "\\\"", $text);
        $text = str_replace("'", "\\'", $text);
        return $text;
    }
}
?>