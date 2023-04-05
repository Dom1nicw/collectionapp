<?php
require_once 'db-connect.php';
class ArtistsDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = connectToDb('dnbalbums');
    }
    public function fetchAll(): array
    {
        $sql = 'SELECT `albumartists`.`album_id`, `artists`.`name` AS `artist`
FROM `albumartists`
INNER JOIN `albums`
ON `albumartists`.`album_id` = `albums`.`id`
INNER JOIN `artists`
ON `albumartists`.`artist_id` = `artists`.`id`';

        $query = $this->db->prepare($sql);
        $query->execute();
        $rows = $query->fetchAll();
    return $rows;
    }
}