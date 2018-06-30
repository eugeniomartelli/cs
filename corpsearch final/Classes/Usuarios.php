<?php

include_once 'DAO.php';

class Usuarios extends DAO {

    public function getByUser($user) {
        $query = parent::$db->prepare("SELECT * FROM usuarios WHERE login = :login");
        $query->execute(['login'=>$user]);
        return $query->fetch();
    }
    
    public function getByNome($nome) {
        $query = parent::$db->prepare("SELECT * FROM usuarios WHERE nome LIKE :nome");
        $query->execute(['nome'=>"%$nome%"]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id){
        $query = parent::$db->prepare("SELECT * FROM usuarios WHERE id=:id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC); //FETCH
    }

    public function insert($dados) {
        $query = parent::$db->prepare("INSERT INTO usuarios (login,senha,nome,pfpj,rgie,endereco,numero,bairro,cidade,uf,cep,email,telefone,tipousuario)"
                . " VALUES (:login,:senha,:nome,:pfpj,:rgie,:endereco,:numero,:bairro,:cidade,:uf,:cep,:email,:telefone,:tipousuario)");
        return $query->execute($dados);
    }
    
    public function getAll() {
        $query = DAO::$db->prepare('SELECT * FROM usuarios ORDER BY nome');
        $query->execute();
        return $query->fetchAll();
    }
    
    public function update($dados){
        $query = parent::$db->prepare('UPDATE usuarios SET nome=:nome,usuario=:usuario,senha=:senha,tipo=:tipo,foto=:foto WHERE id=:id');
        return $query->execute($dados);
    }
    
    public function delete($id){
        $query = parent::$db->prepare('DELETE FROM usuarios WHERE id=:id');
        return $query->execute(["id" => $id]);
    }

}
