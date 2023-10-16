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

$restaurantChains = RandomGenerator::generateArray("restaurantChains");

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
    <div class="text-center my-3 bg-primary">
        <h1>Restaurant Chain Mockup</h1>
    </div>
    <?php foreach ($restaurantChains as $restaurantChain): ?>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <?php
                        echo "★★★RestaurantChain★★★\n";
                        echo "Restaurant Chain Information\n";
                        echo $restaurantChain->toHTML();
                        echo "★★★Company★★★\n";
                        echo $restaurantChain->toCompanyHTML();
                    ?>
                </div>
            </div>
        </div>
        
        <?php foreach ($restaurantChain->getRestaurantLocation() as $restaurantLocation): ?>
            <?php 
                echo "★★★RestaurantLocation★★★";
                echo $restaurantLocation->toHTML(); 
            ?>

            <!-- ユーザー情報の表示 -->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #_debug
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <?php foreach ($restaurantLocation->getEmployees() as $employee): ?>
                                <?php 
                                    echo "★★★Employee★★★";
                                    echo $employee->toHTML();
                                ?>
                                <?php
                                    echo "★★★User★★★";
                                    echo $employee->toUserHTML(); 
                                ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <!--  Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>

