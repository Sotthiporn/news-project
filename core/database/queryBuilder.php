<?php
    class QueryBuilder{
        protected $pdo;
        
        public function __construct($pdo){
            $this->pdo=$pdo;
        }

        function getAll_tbl($tbl,$con,$order){
            $query = $this->pdo->prepare("select * from $tbl WHERE $con ORDER BY $order");
            $query->execute();
    
            return $query->fetchAll(PDO::FETCH_OBJ);
            
        }
        function getAll_tbl_limit($tbl,$con,$order,$limit){
            $query = $this->pdo->prepare("select * from $tbl WHERE $con ORDER BY $order LIMIT $limit");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
            
        }
        function getAll_tbl_multi($fld,$tbl,$con,$order){
            $query = $this->pdo->prepare("select $fld from $tbl WHERE $con ORDER BY $order");
            $query->execute();
    
            return $query->fetchAll(PDO::FETCH_NUM);
        }
    }

?>