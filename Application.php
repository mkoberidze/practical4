<?php

namespace app;


class Application extends BaseApplication
{

    public function fetchAlbums()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https:/jsonplaceholder.typicode.com/albums');
        $albums = json_decode($response->getBody() , true);
        return $albums;
    }

    public function fetchPhotos(int $albumId)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https:/jsonplaceholder.typicode.com/albums/$albumId/photos");
        return json_decode($response->getBody() , true);

    }

    public function saveAlbums(array $albums)
    {


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cupractical";

try {
  $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

  // begin the transaction
  $conn->beginTransaction();
  foreach ($albums as $album) {
      $albumsName = $album['title'];
      // our SQL statements
      $conn->exec("INSERT INTO albums (name)
  VALUES ('$albumsName')");
  }
  // commit the transaction
  $conn->commit();
  echo "New records created successfully";
} catch(\PDOException $e) {
  // roll back the transaction if something failed
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}

$conn = null;

    }

    public function savePhotos(array $photos)
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cupractical";

        try {
            $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // begin the transaction
            $conn->beginTransaction();
            foreach ($photos as $photo) {
                $title  = $photo['title'];
                $url    = $photo['url'];
                $albumId= $photo['albumId'];

                $conn->exec("insert into photos (title,url,album_id) values('$title', '$url', $albumId) ");
                // our SQL statements
            }
            // commit the transaction
            $conn->commit();
            echo "New records created successfully";
        } catch(\PDOException $e) {
            // roll back the transaction if something failed
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }

        $conn = null;

    }

    public function updatePhotoCount(int $albumId, int $photoCount)
    {


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cupractical";

try {
  $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

  $sql = "update albums set photos=$photoCount where id=$albumId";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
} catch(\PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
    }
}