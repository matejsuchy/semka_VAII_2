<?php


class DBStorage implements IStorage 
{

    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', 'secret', 'strojopis');

    }

    public function getAllData()
    {

    }
    public function store()
    {

    }
}