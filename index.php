<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Costumer List</title>
</head>

<body>
    <div class="snip">
        <form action="index.php" method="get">
            <input type="search" name="search" class="input">
            <input type="submit">
        </form>
    </div>
    <div class="data">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>phone</th>
                <th>Address</th>
                <th>Created_At</th>
            </tr>
            <?php
        if (isset($_GET['search'])) {
            include 'webServeses.php';
            $data = fetchCostumers();
            if ($data != null) {
                while ($row = $data->fetch_assoc()) {
                    ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['customer_name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone_number'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                    <form action="index.php" method="get">
                        <button type="submit" name="delete" value="<?= $row['id'] ?>">Delete</button>
                    </form>

                </td>
                <td>
                    <button>Edit</button>
                </td>
            </tr>

            <?php
                }
            }else {
                ?>
            <td colspan="6">No Data</td>
            <?php
            }
        } ?>
        </table>
    </div>


</body>
<?php
if (isset($_GET['delete'])) {
    include 'deleteAccount.php';
    deleteCostumer($_GET['delete']);
  
}
?>

</html>
