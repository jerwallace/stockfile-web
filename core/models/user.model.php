<?php

/*
 * This actor model holds information about an actor.
 * @author Jeremy Wallace
 * @org University of British Columbia
 * @date June 16, 2013
 */

class Actor {

    private $id = 0;
    private $firstname = "";
    private $lastname = "";
    private $gender = "";
    private $movies = array();

    public function __construct($id) {
        $this->id = $id;
        $this->loadActorInfo();
        $this->loadActorMovies();
    }

    public function setName($firstname, $lastname) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getName() {
        return $this->firstname . " " . $this->lastname;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getMovies() {
        return $this->movies;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setMovies($movies) {
        $this->gender = $movies;
    }

    /**
     * Loads all of the actor information.
     * @global type $db
     */
    private function loadActorInfo() {

        global $db;

        $st = $db->prepare("SELECT * FROM actors WHERE id = :id");
        $st->execute(array(":id" => $this->id));


        $aData = $st->fetch();

        $this->setName($aData['first_name'], $aData['last_name']);
        $this->setGender($aData['gender']);
    }

    /**
     * Loads all of the movies that the actor is in.
     * @global type $db
     */
    private function loadActorMovies() {

        global $db;

        $st = $db->prepare("SELECT movies.*, roles.* FROM actors, movies, roles 
                WHERE actors.id = :id AND actors.id = roles.actor_id AND movies.id = roles.movie_id");

        $st->execute(array(":id" => $this->id));
        $this->movies = $st->fetchAll();
    }

}