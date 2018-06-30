<?php

include_once 'DAO.php';

class Produtos extends DAO{
    
    public function getAll() {
        $query = DAO::$db->prepare('SELECT * FROM produtos ORDER BY nome');
//        $query = parent::$db->prepare('SELECT * FROM produtos ORDER BY nome');
        $query->execute();
        return $query->fetchAll();
    }
    
    public function getByNome($q) {
        $query = parent::$db->prepare('SELECT * FROM produtos WHERE nome LIKE :q ORDER BY nome');
        $query->execute(['q' => '%'.$q.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id){
        $query = parent::$db->prepare("SELECT * FROM produtos WHERE id=:id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC); //FETCH
    }
    
    
    public function getNomeById($id){
        $query = parent::$db->prepare("SELECT nome FROM produtos WHERE id=:id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC); //FETCH
    }
    
    public function getByCategoria($categoria){
        $query = parent::$db->prepare("SELECT * FROM produtos WHERE categoria=:categoria");
        $query->execute(['categoria' => $categoria]);
        return $query->fetchAll(PDO::FETCH_ASSOC); //FETCH
    }


    public function insert($dados){
        $query = parent::$db->prepare('INSERT INTO produtos(nome,preco,img,obs,categoria) VALUES (:nome,:preco,:img,:obs,:categoria)');
        
        return $query->execute($dados);
    }
    
    public function update($dados){
        $query = parent::$db->prepare('UPDATE produtos SET nome=:nome,preco=:preco,img=:img,obs=:obs,categoria=:categoria WHERE id=:id');
        
        return $query->execute($dados);
        
    }
    
    public function delete($id){
        $query = parent::$db->prepare('DELETE FROM produtos WHERE id=:id');
        return $query->execute(["id" => $id]);
        
    }
}
