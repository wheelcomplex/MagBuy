<?php
require_once "../../../controller/admin/categories/new_category_controller.php";

//Check if user is blocked
require_once "../../../utility/blocked_user_dir_back.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../../web/assets/css/adminPanel.css">
    <!-- Add Favicon -->
    <link rel="shortcut icon" href="../../../web/assets/images/favicon.ico?v4" type="image/x-icon">
</head>
<body>
<div class="page">
    <form action="../../../controller/admin/categories/new_category_controller.php" method="post">
        <input type="text" name="name" placeholder="Category name" maxlength="40"   required/><br>
        <select name="supercategory_id" required>
            <option disabled selected value="">Choose Supercategory</option>
            <?php
            foreach ($supercategories as $supercategory) {
                echo "<option value=\"" . $supercategory['id'] . "\">" . $supercategory['name'] . "</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Create" name="submit">
    </form>
    <a href="categories_view.php">
        <button>Back to Categories</button>
    </a>
</div>
</body>
</html>
