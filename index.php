<?php
// TODO 1: ваш код обробки GET запиту; виконання запиту через cURL у
//  пошукову систему; підготовка даних для малювання
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $url = 'https://www.google.com/search?q='.urlencode($search_query);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'My Browser'
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $decoded_response = json_decode($response);
    echo 'Result of decoding: '; var_dump($decoded_response);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</ form >
<?php
// !!! TODO 2: код відображення відповіді
if (isset($response)) {

    var_dump($response);
    }
?>
</body>
</html>