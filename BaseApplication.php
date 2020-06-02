<?php
namespace app;

// TODO Implement CurlInterface and MysqlInterface here
abstract class BaseApplication implements CurlInterface,MysqlInterface
{
    public function run()
    {
        $albums = $this->fetchAlbums();
        $this->saveAlbums($albums);

        foreach ($albums as $album) {
            $photos = $this->fetchPhotos($album['id']);
            $this->savePhotos($photos);
            $this->updatePhotoCount($album['id'], count($photos));
        }
    }
}