<?php
class ModelBlackBox extends ModelBase {
    /**
     * Pour afficher les informations de la boite noire
     * @param $id
     * @return list of infos
     */
    public function getData($id) {
        $request = $this->database->prepare("SELECT * from black_box WHERE id = :id");
        $request->bindParam(":id", $id);
        $result= $request->execute();
        $list = $request->fetch(PDO::FETCH_NUM);
        return $list;
    }
    public function getAll() {
        $request = $this->database->prepare("SELECT * from black_box");
        $result= $request->execute();
        $list = $request->fetchAll(PDO::FETCH_NUM);
        return $list;
    }
    /**
     * Récupère la liste des points nécessaires à l'affichage du graphique
     * @param int $id_flight
     * @return array $chart
     */
    public function getDataChart($id_flight, $column) {
        $request = $this -> database -> prepare("SELECT time AS x, $column AS y
                                                FROM black_box
                                                WHERE id_flight = :id_flight 
                                                ORDER BY id ASC ");
        $request -> bindParam(":id_flight", $id_flight, PDO::PARAM_INT);
        $result = $request -> execute();
        $chart = $request -> fetchAll(PDO::FETCH_ASSOC);
        return $chart;
    }
    /**
     * Pour afficher les informations du vol
     * @param $id_flight
     * @return list of infos
     */
    public function getDataFlight($id_flight) {
        $request = $this->database->prepare("SELECT * FROM black_box WHERE id_flight = :id_flight");
        $request->bindParam("id_flight", $id_flight);
        $result = $request->execute();
        $dataFlight = $request->fetchAll(PDO::FETCH_NUM);
        return $dataFlight;
    }
    /**
     * Pour afficher les informations du vol
     * @param $id_user
     * @return list of infos
     */
    public function getDataUser($id_user) {
        $request = $this->database->prepare("SELECT * FROM black_box WHERE id_user = :id_user");
        $request->bindParam("id_user", $id_user);
        $result = $request->execute();
        $dataUser = $request->fetchAll(PDO::FETCH_NUM);
        return $dataUser;
    }
    /**
     * Pour supprimer les informations de la boite noire
     * @param integer $id_flight
     * @return bool $result
     */
    public function deleteData($id) {
        $request = $this->database->prepare("DELETE FROM black_box WHERE id = :id");
        $request->bindParam(":id", $id);
        $result = $request->execute();
        return $result;
    }
    /**
     * Mise à jour des informations de la boite noire du) vol ciblé (accessible uniquement à l'administrateur)
     * @param integer $id_flight
     * @return bool $result
     */
    public function updateData($blackBox) {
        $request = $this->database->prepare("UPDATE black_box
                                            SET id = :id, time = :time, on_off = :on_off, speed = :speed, take_off= :take_off, altitude= :altitude, 
                                            fuel_level= :fuel_level, crash= :crash, id_user= :id_user, id_flight= :id_flight
                                            WHERE id = :id");
        $request->bindParam(":id", $blackBox['id']);
        $request->bindParam(":time", $blackBox['time']);
        $request->bindParam(":on_off", $blackBox['on_off']);
        $request->bindParam(":speed", $blackBox['speed']);
        $request->bindParam(":take_off", $blackBox['take_off']);
        $request->bindParam(":altitude", $blackBox['altitude']);
        $request->bindParam(":fuel_level", $blackBox['fuel_level']);
        $request->bindParam(":crash", $blackBox['crash']);
        $request->bindParam(":id_user", $blackBox['id_user']);
        $request->bindParam(":id_flight", $blackBox['id_flight']);
        $result = $request->execute();
        return $result;
    }
    /**
     * Ajout de boites noires (accessible uniquement à l'administrateur)
     * @param integer $id_flight
     * @return $result
     */
    public function addData($blackBox) {
        $request = $this->database->prepare("INSERT INTO black_Box 
                                            VALUES (NULL, :time, :on_off, :speed, :take_off, :altitude, :fuel_level, :crash, :id_user, :id_flight)");
        $request->bindParam(":time", $blackBox['time']);
        $request->bindParam(":on_off", $blackBox['on_off']);
        $request->bindParam(":speed", $blackBox['speed']);
        $request->bindParam(":take_off", $blackBox['take_off']);
        $request->bindParam(":altitude", $blackBox['altitude']);
        $request->bindParam(":fuel_level", $blackBox['fuel_level']);
        $request->bindParam(":crash", $blackBox['crash']);
        $request->bindParam(":id_user", $blackBox['id_user']);
        $request->bindParam(":id_flight", $blackBox['id_flight']);
        $result = $request->execute();
        return $result;
    }
}