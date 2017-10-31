<?php
//Include Error Handler
require_once '../../../utility/error_handler_dir_back.php';

//Include Admin/Mod check
require_once '../../../utility/admin_session.php';

//Autoload to require needed model files
function __autoload($className)
{
    $className = '..\\..\\..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
}

if (isset($_POST['submit'])) {
    $subCategory = new \model\SubCategory();

    //Try to accomplish connection with the database
    try {

        $subCatDao = \model\database\SubCategoriesDao::getInstance();

        $subCategory->setName(htmlentities($_POST['name']));
        $subCategory->setCategoryId(htmlentities($_POST['category_id']));
        $subCategory->setId($_POST['subcat_id']);


        $subCatDao->editSubCategory($subCategory);

        header("Location: ../../../view/admin/subcategories/subcategories_view.php");


    } catch (PDOException $e) {
        $message = date("Y-m-d H:i:s") . " " . $_SERVER['SCRIPT_NAME'] . " $e\n";
        error_log($message, 3, '../../../errors.log');
        header("Location: ../../../view/error/error_500.php");
        die();
    }

} else {
    try {
        $subcatId = $_GET['scid'];
        $catDao = \model\database\CategoriesDao::getInstance();
        $subcatDao = \model\database\SubCategoriesDao::getInstance();
        $categories = $catDao->getAllCategories();
        $subcat = $subcatDao->getSubCategoryById($subcatId);
    } catch (PDOException $e) {
        $message = date("Y-m-d H:i:s") . " " . $_SERVER['SCRIPT_NAME'] . " $e\n";
        error_log($message, 3, '../../../errors.log');
        header("Location: ../../../view/error/error_500.php");
        die();
    }
}