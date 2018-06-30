<?php

include_once 'DAO.php';

class Categorias extends DAO {

    public function getAll() {
        $query = DAO::$db->prepare('SELECT * FROM categorias ORDER BY nome');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id){
        $query = parent::$db->prepare("SELECT * FROM categorias WHERE id=:id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC); //FETCH
    }

}
