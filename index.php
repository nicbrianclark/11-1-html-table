<?php

// $conn = mysqli_connect('db', 'root', 'root', 'products'); // local
$conn = mysqli_connect('127.0.0.1:3308', '2024bclark', 'bclark734', 'welearnd_gdes261_2024_bclark'); // remote

if( mysqli_connect_errno() ) {
    echo "Database error: " . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM items";
$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <main>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo "$" . $product['price']; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>
</html>