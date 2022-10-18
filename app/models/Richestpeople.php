<?php

/**
 * Dit is de model voor de controller Countries
 */

class Richestpeople
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRichest()
    {
        $this->db->query('SELECT * FROM richestpeople');
        return $this->db->resultSet();
    }
    public function deleteRichest($id)
    {
        $this->db->query("DELETE FROM richestpeople WHERE Id = :Id");
        $this->db->bind(':Id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}
