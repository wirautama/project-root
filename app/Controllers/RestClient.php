<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RestClient extends BaseController
{
    public function index()
    {
        // $client = \Config\Services::curlrequest();
        // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InI3dGF0c3VtYWtpQGdtYWlsLmNvbSIsImlhdCI6MTY4NDE1MzM2MCwiZXhwIjoxNjg0MTU2OTYwfQ.d50pjQwyRQQJmuLEpWzlsyLrUABW2BOvOWUIa1BRYDY";


        // $headers = [
        //     'Authorization' => 'Bearer ' . $token,
        // ];
        // READ
        // $url = 'http://localhost:8080/RestClient';
        // $response = $client->request('GET', $url, ['headers' => $headers, 'http_errors' => false]);


        // CREATE
        // $url = 'http://localhost:8080/RestClient/Komik';
        // $data = [
        //     'judul' => '',
        //     'slug' => '',
        //     'penulis' => '',
        //     'penerbit' => '',
        //     'rilis' => '',
        //     'sampul' => '',
        //     'harga' => '',
        // ];

        // $response = $client->request('POST', $url, ['form_params' => $data, 'headers' => $headers, 'http_errors' => false]);


        // UPDATE
        // $url = 'http://localhost:8080/RestClient/Komik/7';
        // $data = [
        //     'judul' => '',
        //     'slug' => '',
        //     'penulis' => '',
        //     'penerbit' => '',
        //     'rilis' => '',
        //     'sampul' => '',
        //     'harga' => '',
        // ];

        // $response = $client->request('PUT', $url, ['form_params' => $data, 'headers' => $headers, 'http_errors' => false]);

        // DELETE
        // $data = [];
        // $url = 'http://localhost:8080/RestClient/Komik/7';

        // $response = $client->request('DELETE', $url, ['form_params' => $data, 'headers' => $headers, 'http_errors' => false]);


        // echo $response->getBody();
        helper(['restclient']);
        $url = "http://localhost:8080/Api/Komik";
        $data = [];
        $response = akses_restapi('GET', $url, $data);
        echo $response;
        // $dataArray = json_decode($reponse, true);
        // foreach ($dataArray as $values) {
        //     echo "Judul :" . $values['judul'] . "</br>";
        //     echo "Slug :" . $values['slug'] . "</br>";
        //     echo "Penulis :" . $values['penulis'] . "</br>";
        //     echo "Penerbit :" . $values['penerbit'] . "</br>";
        //     echo "Tanggal Rilis :" . $values['rilis'] . "</br>";
        //     echo "Sampul :" . $values['sampul'] . "</br>";
        //     echo "Harga :" . $values['harga'] . "</br>";
        // }
    }
}
