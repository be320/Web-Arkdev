<?php

require_once(__DIR__ . '/../Lib/DBConnection.php');
require_once(__DIR__ . '/../Models/Instructor.php');
class InstructorRepository
{

    public function createInstructor($data , $photo): bool
    {

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO instructor (name, email, bio ,image_path) VALUES (:Insname,:email,:bio,:image_path)");
            $stmt->bindValue(':Insname',$data['name']);
            $stmt->bindValue(':email',$data['email']);
            $stmt->bindValue(':bio',$data['bio']);
            $stmt->bindValue(':image_path', $photo['name']);
            $success = $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $success;
    }

    public function updateInstructor( $data ): bool
    {

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE  instructor set name=:name, email=:email, bio=:bio  where id =:id");
            $stmt->bindValue(':name', $data->getName());
            $stmt->bindValue(':email', $data->getEmail());
            $stmt->bindValue(':id', $data->getInstructorId());
            $stmt->bindValue(':bio', $data->getBio());
            $success = $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $success;
    }

    public function deleteById($id): bool
    {
        $success = false;
        try{

            $db = DBConnection::connect();
            $stmt = $db->prepare("DELETE FROM instructor WHERE id = :id");
            $stmt->bindValue(':id',$id );
            $success = $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        return $success;
    }

    /**
     * return instructor by an assoc array
     * @param $instructorId
     * @return array
     */
    public function getById($instructorId)
    {
        $result = null;

        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM instructor WHERE id=:id");
            $stmt->bindValue(':id',$instructorId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Instructor::class);
            $result = $stmt->fetch();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $result;
    }

    public  function getAll(){

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM instructor");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Instructor::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }


}
