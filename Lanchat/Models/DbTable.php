<?php

/**
 * 
 */
abstract class DbTable
{

    /** le nom de la table SQL
     * @var string 
     * */
    protected $tableName;

    /** nom de la connexion
     * @var PDO
     */
    protected $pdo;

    /** nom de la clé primaire
     * @var string
     */
    protected $pk;

    /** nom du type de la class de retour pour les FETCH CLASS
     * @var string
     */
    protected $model;


    public function __construct(string $_tablename, string $_pk, string $_model)
    {
        $this->tableName = $_tablename;
        $this->pk = $_pk;
        $this->pdo = DbConnection::getInstance();
        $this->model = $_model;
    }

    /** Récupère une ligne de la table
     * @param int $id l'identifiant à rechercher
     * @return Model|null 
     */
    public function select(int $_id){
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $this->pk . ' = :'. $this->pk.';';

        $stmt = $this->pdo->prepare($sql);

        $result = null;

        $stmt->bindValue(':'.$this->pk, $_id);
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
            $result = $stmt->fetch();
        }
        $stmt->closeCursor();
        return $result;
    }

    /** Récupère toute les entrées dans la base de données
     * @return Model[]|null
     */
    public function selectAll(){
        $sql = 'SELECT * FROM ' . $this->tableName;

        $stmt = $this->pdo->prepare($sql);

        $result = null;
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->model);
            $result = $stmt->fetchAll();
        }
        $stmt->closeCursor();
        return $result;
    }

    /** Inser une nouvelle entrée dans la table
     * @param Model $model Entrée à ajouter à la table
     * 
     */
    public function insert(Model $model){
            /** Creer un tableau key=>Value en passant en parametre un tableau de donnée a ignoré*/
            $data = $model->toArray([$this->pk]);

            /** Recuperer les clés dans un tableau et les retourne dans un tableau */
            $datacols = array_keys($data);

            /** Concatenation des clés pour faire une chaine de caractére avec le separateur , */
            $col = implode(',', $datacols);

            var_dump($col);

            /** Concatenation des clés avec le separateur :, pour créé une chaine de caractere de marqueur pour la requete SQL */
            $marks = ':' . implode(',:', $datacols);


            //debug($marks);

            /** Creation de la requete sql INSERT avec $col list des champs de la table a remplir et $marks la liste des marqueurs  */
            $sql = 'INSERT INTO ' . $this->tableName . ' (' . $col . ') VALUE(' . $marks . ');';

//            debug($sql, 'Requete SQL');


            $stmt = $this->pdo->prepare($sql);



            if ($stmt->execute($data)) {
                return $this->pdo->lastInsertId();
            } else{
                return 0;
            }
    }

    /**
     * 
     */
    public function update(Model $_model){

    $modeltab=$_model->toArray();
    
    foreach($modeltab as $key=>$value){
        ($key!=$this->pk)? $input[]=$key.'=:'.$key:'';
    }
    $query=implode(',',$input);


    $sql="UPDATE ".$this->tableName." SET ".$query." WHERE ".$this->pk."=:".$this->pk.";";
    debug($sql);
    $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute($modeltab)) {
            $stmt->closeCursor();
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     */
    public function delete(int $_id){
        $sql = 'DELETE FROM ' . $this->tableName . ' WHERE ' . $this->pk . '=:'.$this->pk.' ;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $_id);

        if ($stmt->execute()) {

            $stmt->closeCursor();
            return $stmt->rowCount();;
        } else {
            return 0;
        }
    }
}