<?php

class Database extends PDO {

   function __construct() {
      try {
         parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
         $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
         Logger::newMessage($e);
         Logger::customErrorMsg();
      }
   }

   public function select($prepared_sql, $data = array()) {
      $statement = $this->prepare($prepared_sql);
      foreach($data as $key => $value) {
         $statement->bindValue("$key", $value);
      }

      $statement->execute();
      return $statement->fetchAll();
   }

   /**
     * insert method
     * @param  string $table table name
     * @param  array $data  array of columns and values
     */
    public function insert($table, $data) {
        ksort($data);

        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $stmt = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $this->lastInsertId();
    }

   /**
    * update method
    * @param  string $table table name
    * @param  array $data  array of columns and values
    * @param  array $where array of columns and values
    */
   public function update($table, $data, $where) {
       ksort($data);

       $fieldDetails = null;
       foreach ($data as $key => $value) {
           $fieldDetails .= "$key = :field_$key,";
       }
       $fieldDetails = rtrim($fieldDetails, ',');

       $whereDetails = null;
       $i = 0;
       foreach ($where as $key => $value) {
           if ($i == 0) {
               $whereDetails .= "$key = :where_$key";
           } else {
               $whereDetails .= " AND $key = :where_$key";
           }
           $i++;
       }
       $whereDetails = ltrim($whereDetails, ' AND ');

       $stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $whereDetails");

       foreach ($data as $key => $value) {
           $stmt->bindValue(":field_$key", $value);
       }

       foreach ($where as $key => $value) {
           $stmt->bindValue(":where_$key", $value);
       }

       $stmt->execute();
       return $stmt->rowCount();
   }

   /**
    * Delete method
    * @param  string $table table name
    * @param  array $data  array of columns and values
    * @param  array $where array of columns and values
    * @param  integer $limit limit number of records
    */
   public function delete($table, $where, $limit = 1) {
       ksort($where);

       $whereDetails = null;
       $i = 0;
       foreach ($where as $key => $value) {
           if ($i == 0) {
               $whereDetails .= "$key = :$key";
           } else {
               $whereDetails .= " AND $key = :$key";
           }
           $i++;
       }
       $whereDetails = ltrim($whereDetails, ' AND ');

       //if limit is a number use a limit on the query
       if (is_numeric($limit)) {
           $uselimit = "LIMIT $limit";
       }

       $stmt = $this->prepare("DELETE FROM $table WHERE $whereDetails $uselimit");

       foreach ($where as $key => $value) {
           $stmt->bindValue(":$key", $value);
       }

       $stmt->execute();
       return $stmt->rowCount();
   }

   public function truncate($table) {
      return $this->exec("TRUNCATE TABLE $table");
   }

}
