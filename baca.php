<?php
session_start();

include('function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <?php
    $id = $_GET['id'];
    $pesan = fetchData($id);
    var_dump($pesan);
    ?>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Pesan</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $pesan['pesan'] ?></th>
                    <td><?= date($pesan['pesan']) ?></td>
                </tr>
            </tbody>
        </table>
        <form action="
        <?php
        if (isset($_POST['submit'])) {
            updateData($id);
        }
        ?>" method="post">
            <button class="btn btn-<?= changeButton($id) ?>
            " type="submit" name="submit"><?= isRead($id) ?></button>
        </form>

        <a class="btn btn-primary mt-3" href="index.php" role="button">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php
// if (isRead($id) == 'unread') {
//     echo 'success';
// } else {
//     echo 'danger';
// }
?>