<?php 

function oneB(PDO $conn): ?array
{
    $sql = "SELECT u.firstname, u.lastname, o.id, o.value as ukupnaVrednost FROM user u INNER JOIN order o ON u.id = o.userId";
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