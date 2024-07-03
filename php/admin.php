<?php
session_start();
require 'db.php'; // Подключение к базе данных

$isLoggedIn = isset($_SESSION['id']);
$login = $isLoggedIn ? $_SESSION['login'] : '';
$email = $isLoggedIn ? $_SESSION['email'] : '';
$role = $isLoggedIn ? $_SESSION['role'] : '';

// Функция для получения данных из таблицы или представления
function getDataFromTableOrView($name) {
    global $db;
    $result = $db->query("SELECT * FROM $name");
    if (!$result) {
        die("Ошибка запроса: " . $db->error);
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Функция для добавления данных в таблицу
function addData($table, $data) {
    global $db;
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $query = "INSERT INTO $table ($columns) VALUES ('$values')";
    if (!$db->query($query)) {
        die("Ошибка запроса: " . $db->error);
    }
}

// Функция для обновления данных в таблице
function updateData($table, $data, $id) {
    global $db;
    $set = [];
    foreach ($data as $column => $value) {
        $set[] = "$column='$value'";
    }
    $set = implode(", ", $set);
    $query = "UPDATE $table SET $set WHERE id=$id";
    if (!$db->query($query)) {
        die("Ошибка запроса: " . $db->error);
    }
}

// Функция для удаления данных из таблицы
function deleteData($db, $table, $id) {
    try {
        $sql = "DELETE FROM $table WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
        header("Location: admin.php?table=$table");
    } catch (mysqli_sql_exception $e) {
        // Обработка ошибки нарушения внешнего ключа
        if ($e->getCode() == 1451) {
            echo "<script>alert('Cannot delete or update a parent row: a foreign key constraint fails. Please resolve dependencies first.'); window.location.href='admin.php?table=$table';</script>";
        } else {
            echo "<script>alert('Error occurred: " . $e->getMessage() . "'); window.location.href='admin.php?table=$table';</script>";
        }
    }
}

// Обработка добавления, изменения и удаления данных
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $target = isset($_POST['table']) ? $_POST['table'] : $_POST['view']; // Определение цели (таблицы или представления)

    if ($action == 'add') {
        addData($target, $_POST['data']);
    } elseif ($action == 'edit') {
        $id = $_POST['id'];
        updateData($target, $_POST['data'], $id);
    } elseif ($action == 'delete') {
        $id = $_POST['id'];
        deleteData($db, $target, $id);
    }
}

// Получение списка таблиц и представлений для админ-панели
$tables = ['agents', 'clients', 'deals', 'houses', 'users'];
$views = [
    'Agents_with_total_deals',
    'Available_houses_of_type',
    'Clients_in_price_range',
    'Clients_interested_in_type',
    'Clients_with_deals_amount',
    'Deals_by_agent',
    'Houses_available_on_date',
    'Houses_detailed_info',
    'Houses_in_area',
    'Houses_with_agents'
];

// Получение данных таблиц и представлений
$data = [];
foreach ($tables as $table) {
    $data[$table] = getDataFromTableOrView($table);
}
foreach ($views as $view) {
    $data[$view] = getDataFromTableOrView($view);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../sass/admin.css"> 
    <link rel="stylesheet" href="../sass/lk.css">
    <link rel="stylesheet" href="../sass/styles.css">
    <link rel="stylesheet" href="../sass/reset.css">
</head>
<body>
<header class="header">
        <div class="header__container">
            <button class="header__burger-btn" id="burger">
                <span></span><span></span><span></span>
            </button>
            <nav class="header__nav">
                <a href="../index.php" class="header__logo"><img src="../images/logo.svg" alt="Логотип"></a>
                <ul class="header__list">
                    <li class="header__item"><a href="../index.php" class="header__link">Услуги</a></li>
                    <li class="header__item"><a href="estate.php" class="header__link">Недвижимость</a></li>
                    <li class="header__item"><a href="about.php" class="header__link">О нас</a></li>
                </ul>
                <div class="header__buttons">
                    <?php if ($isLoggedIn): ?>
                        <a href="lk.php" class="header__reg">Личный Кабинет</a>
                    <?php else: ?>
                        <a href="auth.php" class="header__auth">Вход</a>
                        <a href="register.php" class="header__reg">Регистрация</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>

    <h1 class="admin_h1">Админ Панель Таблицы</h1>
    <nav>
        <ul class="admin_ul">
            <div class="admin_row">
            <?php foreach ($tables as $table): ?>
                <li class="admin_li"><a class="admin_a" href="?table=<?php echo $table; ?>"><?php echo ucfirst($table); ?></a></li>
            <?php endforeach; ?>
            </div>
            <h1 class="admin_h1">Запросы</h1>
            <div class="admin_box">
            <?php foreach ($views as $view): ?>
                <li class="admin_li"><a class="admin_a" href="?view=<?php echo $view; ?>"><?php echo str_replace('_', ' ', ucwords($view)); ?></a></li>
            <?php endforeach; ?>
            </div>
        </ul>
    </nav>

    <?php if (isset($_GET['table']) && $_GET['table'] != 'queries'): 
        $table = $_GET['table'];
        $columns = $db->query("SHOW COLUMNS FROM $table")->fetch_all(MYSQLI_ASSOC);
        $rows = $data[$table];
    ?>
        <h2><?php echo ucfirst($table); ?></h2>
        <table>
            <thead>
                <tr>
                    <?php foreach ($columns as $column): ?>
                        <th><?php echo $column['Field']; ?></th>
                    <?php endforeach; ?>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?php echo $cell; ?></td>
                        <?php endforeach; ?>
                        <td>
                            <!-- Кнопки для открытия модальных окон -->
                            <button class="editBtn" data-id="<?php echo $row['id']; ?>">Изменить</button>
                            <button class="deleteBtn" data-id="<?php echo $row['id']; ?>">Удалить</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Добавить данные <?php echo ucfirst($table); ?></h3>
        <!-- Кнопка для открытия модального окна для добавления -->
        <button id="openAddModal" class="admin_add">Добавить</button>
    <?php elseif (isset($_GET['view']) && in_array($_GET['view'], $views)): 
        $view = $_GET['view'];
        $columns = $db->query("SHOW COLUMNS FROM $view")->fetch_all(MYSQLI_ASSOC);
        $rows = $data[$view];
    ?>
        <h2><?php echo str_replace('_', ' ', ucwords($view)); ?></h2>
        <table>
            <thead>
                <tr>
                    <?php foreach ($columns as $column): ?>
                        <th><?php echo $column['Field']; ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?php echo $cell; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Модальное окно для добавления/редактирования -->
    <div id="modal" style="display: none;">
        <div id="modalContent">
            <span id="closeModal" class="admin_span">&times;</span>
            <form id="modalForm" method="POST">
                <input type="hidden" name="table" value="<?php echo isset($table) ? $table : ''; ?>">
                <input type="hidden" name="id" id="modalId">
                <input type="hidden" name="action" id="modalAction">
                <?php if (isset($columns)): ?>
                    <?php foreach ($columns as $column): ?>
                        <label for="<?php echo $column['Field']; ?>"><?php echo $column['Field']; ?></label>
                        <input type="text" name="data[<?php echo $column['Field']; ?>]" id="<?php echo $column['Field']; ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
                <button type="submit">Вперед</button>
            </form>
        </div>
    </div>

    <script src="../js/admin.js"></script>
</body>
</html>
