<?php
require_once 'db-connect.php';
require_once 'Album.php';
class AlbumsDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = connectToDb('dnbalbums');
    }

    public function fetchAll(): array
    {
        $sql = 'SELECT `albums`.`id`, `name`, `release_date`, `album_or_single`, 
            `link_to_image`, `reasons`.`reason`
            FROM albums
            LEFT JOIN `reasons`
            ON `albums`.`reason_for_inclusion` = `reasons`.`id`';

        $query = $this->db->prepare($sql);
        $query->execute();
        $rows = $query->fetchAll();

        $albums = [];
        foreach ($rows as $row) {
            $albums[] = new Album($row['id'], $row['name'], $row['release_date'],
                $row['album_or_single'], $row['link_to_image'], $row['reason'], '');
        }
        return $albums;
    }
}