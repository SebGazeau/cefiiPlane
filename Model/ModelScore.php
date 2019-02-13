<?php

class ModelScore extends ModelBase
{
    public function __construct() {
        parent::__construct();
    }

    /**
     * Insère un nouveau score dans la table
     * @param int $idUser
     * @param float $flightTime
     * @param float $distance
     * @return bool  $result 
     */
    public function insertScore($idUser, $flightTime, $distance, $score) {
        $request = $this -> database -> prepare ("INSERT INTO score(id, flight_time, distance, score, id_user) 
                                                VALUES (null, :flightTime, :distance, :score, :idUser)");
        $request -> bindParam(":flightTime", $flightTime);
        $request -> bindParam(":distance", $distance);
        $request -> bindParam(":score", $score);
        $request -> bindParam(":idUser", $idUser);
        $result = $request -> execute();

        return $result;
    }

    /**
     * Récupère la liste des meilleurs scores
     * @param int $scoreNumber
     * @return array $scores
     */
    public function bestScores($scoreNumber) {
        $request = $this -> database -> prepare("SELECT user.name, score.score, score.flight_time, score.distance
                                                FROM score
                                                JOIN user ON score.user_id = user.id
                                                ORDER BY score.score DESC
                                                LIMIT :scoreNumber");
        $request -> bindParam(":scoreNumber", $scoreNumber);
        $request -> execute();
        $scores = $request -> fetchALL(PDO::FETCH_NUM);

        return $scores;
    }

    /**
     * Récupère la liste des meilleurs scores personnels
     * @param int $id_user
     * @return array $scores
     */
    public function bestPersonalScore($id_user) {
        $request = $this -> database -> prepare("SELECT score.score, score.flight_time, score.distance
                                                FROM score
                                                ORDER BY score DESC
                                                LIMIT 1");
        $request -> execute();
        $scores = $request -> fetchfetchALL(PDO::FETCH_NUM);

        return $score;
    }
}
