<?php

  class Connection {

    protected $db = null;

    public function __construct(string $db_name, string $ip = "127.0.0.1", string $username = "root", string $password = "", array $connection_params = [], string $charset = "utf8", int $port = 3306){
      try {
        $this->db = new PDO("mysql:host=$ip;dbname=$db_name;charset=$charset;port=$port", $username, $password, $connection_params);
      } catch(PDOException $e) {
        die(new PDOException($e->getMessage(), (int)$e->getCode()));
      }
    }

    public function query(string $query, array $params = [], $fetch_method = PDO::FETCH_BOTH){
      try {

        $stmt = $this->db->prepare($query);
        foreach($params as $k=>$v){
          $stmt->bindParam(":$k", $v);
        }
        $stmt->execute();
        $result = $stmt->fetchAll($fetch_method);
        $stmt->closeCursor();
        return $result;

      } catch(PDOException $e) {
        die(new PDOException($e->getMessage(), (int)$e->getCode()));
      }
    }

    public function unsafe_query(string $query, $fetch_method = PDO::FETCH_BOTH){
      $stmt = $this->db->query($query);
      $result = $stmt->fetchAll($fetch_method);
      $stmt->closeCursor();
      return $result;
    }

    public function close(){
      $this->db = null;
      return "Database connection successfully closed";
    }

  }

?>
