<?php

interface UserRepositoryContract
{
    public function create(array $data): ?int; 
}

class UserRepository implements UserRepositoryContract
{
    public function __construct(private readonly PDO $conn)
    {
        
    }

    public function create(array $data): ?int 
    {
        $sql="INSERT INTO users (name, surname, email, phone, username, password, city, postalCode, address) 
        VALUES (:name, :surname, :email, :phone, :username, :password, :city, :postalCode, :address)";
        $stmt = $this->conn->prepare($sql);
        try{
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':surname', $data['surname'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
            $stmt->bindParam(':city', $data['city'], PDO::PARAM_STR);
            $stmt->bindParam(':postalCode', $data['postalCode'], PDO::PARAM_INT); 
            $stmt->bindParam(':address', $data['address'], PDO::PARAM_STR); 
            $stmt->execute();
            return $this->conn->lastInsertId();
        }catch(PDOException $e){
            // Log error ($e->getMessage())
            return null;
        } 
    }
}