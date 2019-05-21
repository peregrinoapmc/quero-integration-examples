<?php

// insert your admission.id
$admissionId = 869;

// insert your token
$token = "your_token";

// insert your enrollment_id
$external_enrollment_id = "abc123";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://queroalunos-admission.querobolsa.space/api/v1/admissions/" . $admissionId,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS => "\n{\n\t\"status\": \"enrolled\",\n\t\"extra_data\": {\"external_enrollment_id\": \"" .$external_enrollment_id ."\"}\n\t\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Token " . $token,
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}