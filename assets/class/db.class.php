<?php
Class DB
{
	protected $db;
    static private $instance = null;

    private function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "task3");
    }

    private function __clone()
    {
    }

    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }



    public function query($sql)
    {
        return $this->db->query($sql);
    }
}