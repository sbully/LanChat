<?php

class Users extends DbTable
{



    public function __construct()
    {

        parent::__construct('users', 'Id_User', 'User');
    }

    public function select(int $_id)
    {
        return parent::select($_id);
    }

    public function selectAll()
    {
        return parent::selectAll();
    }

    /** Inser une nouvelle entrée dans la table
     * @param Model $model Entrée à ajouter à la table
     * 
     */
    public function insert(Model $_model)
    {

        if ($_model instanceof User) {
            return parent::insert($_model);
        }
        return 0;
    }


    /**
     * 
     */
    public function update(Model $_model)
    {
        if ($_model instanceof User) {
            return parent::update($_model);
        }
    }

    /**
     * 
     */
    public function delete(int $_id)
    {
        return parent::delete($_id);
    }

    public function find($param){
        
        foreach ($param as $key => $value) {
            $tab[]=$key.'=:'.$key;
        }
        $query=implode(' AND ',$tab);
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE '.$query.';';
        debug($sql,'requete sql');
        $stmt=$this->pdo->prepare($sql);

        if($stmt->execute($param)){
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
        $result = $stmt->fetch();
        }
        $stmt->closeCursor();
        return $result;
    }

    
}