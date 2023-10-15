<?php
// コードベースのファイルのオートロード
// spl_autoload_register();
// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

require_once __DIR__ . "/Helpers/RandomGenerator.php"; 
require_once __DIR__ . "/Models/Company.php"; 
require_once __DIR__ . "/Models/Employee.php"; 
require_once __DIR__ . "/Models/RestaurantChain.php"; 
require_once __DIR__ . "/Models/RestaurantLocation.php"; 

use Helpers\RandomGenerator;

$restaurantChain = RandomGenerator::restaurantChain();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Chain Mockup</title>
    <!-- Bootstrap CSSを読み込む -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        /* ユーザーカードのスタイル */
    </style>
</head>
<body>
    <h1>Restaurant Chain Mockup</h1>
    <?php
    echo $restaurantChain->toHTML();
    echo $restaurantChain->getToCompanyHTML();
    ?>
    
    <?php foreach ($restaurantChain->$restaurantLocation as $restaurantLocation): ?>
    <div class="user-card">
        <!-- ユーザー情報の表示 -->
        <?php echo $restaurantLocation->toHTML(); ?>
        <?php foreach ($restaurantLocation->$employees as $employee): ?>
            <?php echo $employee->toHTML(); ?>
            <?php echo $employee->getToUserHTML(); ?>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>

    <!--  Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>