<?php

namespace app;

interface MysqlInterface
{
    /**
     * Save albums in Mysql database `albums` table
     *
     * @param array $albums Array of albums
     * @return mixed
     */
    public function saveAlbums(array $albums);

    /**
     * Save photos in Mysql database `photos` table
     *
     * @param array $photos
     */
    public function savePhotos(array $photos);

    /**
     * Update `photos` column of the `albums` table with given count
     *
     * @param int $albumId
     * @param int $photoCount
     * @return mixed
     */
    public function updatePhotoCount(int $albumId, int $photoCount);
}