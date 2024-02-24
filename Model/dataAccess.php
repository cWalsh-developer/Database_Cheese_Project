<?php 
    $pdo = new PDO("mysql:host=localhost;dbname=db_k2116573",
    "k2116573",
    "oguizinu",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    function getAllStudents()
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM students");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Products");
        return $results;
    }

    function getStudentsBySurname($surname)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM students WHERE familyName = ?");
        $statement->execute([$surname]);
        $results = $statement->fetchAll (PDO::FETCH_CLASS, "Student");
        return $results;
    }

    function getStudentByGivenName($givenName)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM students WHERE givenName = ?");
        $statement->execute([$givenName]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Student");
        return $results;
    }
?>