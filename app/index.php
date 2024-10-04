<?
$mysqli = mysqli_connect("db", "root", $_ENV["MYSQL_ROOT_PASSWORD"], "example_db");

if ($mysqli == false) {
    die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}

if ($_POST && $_POST["name"] && $_POST["number"]) {
    $stmt = $mysqli->prepare("INSERT INTO phonebook(name, number) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST["name"], $_POST["number"]);
    $stmt->execute();
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
}

$sql = 'SELECT * FROM phonebook';
$result = mysqli_query($mysqli, $sql);

?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <h1>Useless phonebook</h1>
                <form method="POST" class="mb-4">
                    <div class="mb-3">
                        <label class="form-label">Имя</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Телефон</label>
                        <input type="text" class="form-control" name="number">
                    </div>
                    <? if ($_POST && (!$_POST['name'] || !$_POST['number'])) {
                        print("Не заполнено имя или номер");
                    } ?>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Номер телефона</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        while ($row = mysqli_fetch_array($result)) {
                            print("
                                <tr> 
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['number']}</td>
                                </tr>
                            ");
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>