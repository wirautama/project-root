<?php

use App\Models\ApiTokenModel;

function akses_restapi($method, $url, $data)
{
    $client = \Config\Services::curlrequest();
    $model = new ApiTokenModel();
    $idToken = "1";
    $token = $model->getToken($idToken);

    $tokenPart = explode(".", $token);
    $payload = $tokenPart[1];
    $decode = base64_decode($payload);
    $json = json_decode($decode, true);
    $exp = $json['exp'];

    $waktuSekarang = time();
    if ($exp <= $waktuSekarang) {
        $url = "http://localhost:8080/otentikasi";
        $form_params = [
            'email' => 'r7tatsumaki@gmail.com',
            'password' => 'akugakero',
        ];
        $response = $client->request('POST', $url, ['http_errors' => false, 'form_params' => $form_params]);
        $response = json_decode($response->getBody(), true);
        $token = $response['access_token'];

        $dataToken = [
            'id' => $idToken,
            'token' => $token
        ];
        $model->save($dataToken);
    }

    $headers = [
        'Authorization' => 'Bearer ' . $token,
    ];
    $response = $client->request($method, $url, ['headers' => $headers, 'https_errors' => false, 'form_params' => $data]);
    return $response->getBody();
}
