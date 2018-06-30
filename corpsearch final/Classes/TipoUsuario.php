<?php

include_once 'DAO.php';

class TipoUsuario extends DAO {

    public function getAll() {
        $query = DAO::$db->prepare('SELECT * FROM tipousuario ORDER BY tipo');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getByDesc($q) {
        $query = parent::$db->prepare('SELECT * FROM tipousuario WHERE descricao LIKE :q ORDER BY nome');
        $query->execute(['q' => '%'.$q.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id){
        $query = parent::$db->prepare("SELECT * FROM tipousuario WHERE id=:id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC); //FETCH
    }
    
    public function update($dados){
        $query = parent::$db->prepare('UPDATE tipousuario SET descricao=:descricao WHERE id=:id');
        return $query->execute($dados);
    }
    
    public function delete($id){
        $query = parent::$db->prepare('DELETE FROM tipousuario WHERE id=:id');
        return $query->execute(["id" => $id]);
    }
    
    public function insert($dados) {
        $query = parent::$db->prepare("INSERT INTO tipousuario (descricao) VALUES (:descricao)");
        return $query->execute($dados);
    }

}
