<?php

// 4.task
function ordersIndex(PDO $conn): ?array
{
    $sql="SELECT o.* FROM `order` o";
    $stmt = $conn -> prepare($sql);
    try{
        $stmt->execute();
        $data = $stmt -> fetchAll();
        return ($stmt->rowCount() > 0) ? $data : null;
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    } 
}

function register(
    PDO $conn,
    string $name, 
    string $surname,
    string $email,  
    string $phone, 
    string $username, 
    string $password, 
    string $city, 
    int $postalCode, 
    string $address): ?bool
{
    $sql="INSERT INTO users (name, surname, email, phone, username, password, city, postalCode, address) 
        VALUES (:name, :surname, :email, :phone, :username, :password, :city, :postalCode, :address)";
    $stmt = $conn -> prepare($sql);
    try{
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':postalCode', $postalCode, PDO::PARAM_INT); 
        $stmt->bindParam(':address', $address, PDO::PARAM_STR); 
        $stmt->execute();
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    } 
}


// 5. task
function oneA(PDO $conn): ?array
{
    $sql = "SELECT u.* FROM user u WHERE u.dateCreate >= DATE_ADD(CURDATE(), INTERVAL -3 DAY)";
    $stmt = $conn->prepare($sql);
    try{
        $stmt->execute();
        $data = $stmt -> fetchAll();
        return ($stmt->rowCount() > 0) ? $data : null;
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    }
}

function oneB(PDO $conn): ?array
{
    $sql = "SELECT u.firstname, u.lastname, o.id, SUM(o.value) as ukupnaVrednost FROM user u INNER JOIN order o ON u.id = o.userId";
    $stmt = $conn->prepare($sql);
    try{
        $stmt->execute();
        $data = $stmt -> fetchAll();
        return ($stmt->rowCount() > 0) ? $data : null;
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    }
}

function twoC(PDO $conn): ?array
{
    $sql = "SELECT u.*, COUNT(o.id) as brojPorudzbina FROM `user` u INNER JOIN `order` o ON u.id = o.userId GROUP BY u.id HAVING COUNT(o.id) > 1";
    $stmt = $conn->prepare($sql);
    try{
        $stmt->execute();
        $data = $stmt -> fetchAll();
        return ($stmt->rowCount() > 0) ? $data : null;
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    }
}

function twoD(PDO $conn): ?array
{
    $sql = "SELECT u.firstname, u.lastname, o.id, COUNT(oi.id) as brojStavkiPorudzbine FROM `user` u INNER JOIN `order` o ON u.id = o.userId INNER JOIN `orderitem` oi ON o.id = oi.orderId GROUP BY o.id";
    $stmt = $conn->prepare($sql);
    try{
        $stmt->execute();
        $data = $stmt -> fetchAll();
        return ($stmt->rowCount() > 0) ? $data : null;
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    }
}

function twoE(PDO $conn): ?array
{
    $sql = "SELECT u.firstname, u.lastname, o.id, COUNT(oi.id) as brojStavkiPorudzbine FROM `user` u INNER JOIN `order` o ON u.id = o.userId INNER JOIN `orderitem` oi ON o.id = oi.orderId GROUP BY o.id HAVING brojStavkiPorudzbine > 1";
    $stmt = $conn->prepare($sql);
    try{
        $stmt->execute();
        $data = $stmt -> fetchAll();
        return ($stmt->rowCount() > 0) ? $data : null;
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    }
}

// not finished
function twoF(PDO $conn): ?array
{
    $sql = "SELECT u.*, COUNT(oi.id) as brojStavkiPorudzbine FROM `user` u INNER JOIN `order` o ON u.id = o.userId INNER JOIN `orderitem` oi ON o.id = oi.orderId GROUP BY u.id HAVING brojStavkiPorudzbine > 2";
    $stmt = $conn->prepare($sql);
    try{
        $stmt->execute();
        $data = $stmt -> fetchAll();
        return ($stmt->rowCount() > 0) ? $data : null;
    }catch(PDOException $e){
        // Log error ($e->getMessage())
        return null;
    }
}