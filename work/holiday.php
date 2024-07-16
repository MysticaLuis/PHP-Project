<?php

$url = "https://data.gov.sg/api/action/datastore_search?resource_id=6228c3c5-03bd-4747-bb10-85140f87168b&limit=10";

try {
   
    $ch = curl_init();

    if ($ch === false) {
        throw new Exception('Failed to initialize cURL session.');
    }

    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   
    $response = curl_exec($ch);

   
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        throw new Exception('cURL Error: ' . $error);
    }

   
    curl_close($ch);

   
    $data = json_decode($response, true);

    
    if ($data === null) {
        throw new Exception('Failed to decode JSON response.');
    }

    
    if (!isset($data['result']['records'])) {
        throw new Exception('Error: Could not retrieve holiday data.');
    }

    $holidays = $data['result']['records'];
} catch (Exception $e) {
    
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public Holidays</title>
    <style>
        body{
        background: #1690A7;
     }
       table {
            background:white;
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color:#999;
        }
    </style>
</head>
<body>

<h1>Public Holidays</h1>

<table>
    <tr>
        <th>Date</th>
        <th>Holiday Name</th>
        <th>Day</th>
    </tr>
    <?php foreach ($holidays as $holiday) : ?>
    <tr>
        <td><?php echo htmlspecialchars($holiday['date']); ?></td>
        <td><?php echo htmlspecialchars($holiday['holiday']); ?></td>
        <td><?php echo htmlspecialchars($holiday['day']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
