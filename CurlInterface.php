<?php

namespace app;

interface CurlInterface
{

    /**
     * Fetch albums using CURL from: https://jsonplaceholder.typicode.com/albums
     *
     * @return mixed
     */
    public function fetchAlbums();

    /**
     * Fetch photos for given album from the following link: https://jsonplaceholder.typicode.com/albums/{albumID}/photos
     *
     * @param int $albumId
     * @return mixed
     */
    public function fetchPhotos(int $albumId);
}