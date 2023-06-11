<?php

interface OrderRepositoryContract
{
    public function getAll(): ?array; 
}

class OrderRepository implements OrderRepositoryContract
{
    public function __construct(private readonly PDO $conn)
    {
        
    }

    public function getAll(): ?array 
    {
        $sql="SELECT o.* FROM `order` o";
        $stmt = $this->conn->prepare($sql);
        try{
            $stmt->execute();
            $data = $stmt->fetchAll();
            return ($stmt->rowCount() > 0) ? $data : null;
        }catch(PDOException $e){
            // Log error ($e->getMessage())
            return null;
        } 
    }
}