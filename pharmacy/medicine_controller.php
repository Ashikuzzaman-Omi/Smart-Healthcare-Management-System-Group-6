<?php
require_once 'includes/auth.php'; 
require_once 'config/db.php';
require_once 'models/Medicine.php';

require_login();

$medicine = new Medicine($conn);

$action  = isset($_GET['action']) ? $_GET['action'] : 'list';
$message = isset($_GET['msg']) ? $_GET['msg'] : '';

switch ($action) {

    case 'list':
        $result = $medicine->getAll();
        include 'views/medicine_list.php';
        break;

    case 'stock':
        $result = $medicine->getAll();
        include 'views/stock_check.php';
        break;

    case 'search':
        $keyword  = isset($_GET['search']) ? $_GET['search'] : '';
        $searched = ($keyword != '');
        $result   = $searched ? $medicine->search($keyword) : null;
        include 'views/medicine_search.php';
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            verify_csrf();
            $medicine->add($_POST);
            header("Location: medicine_controller.php?action=list&msg=Medicine added successfully");
            exit();
        }
        include 'views/medicine_add.php';
        break;

    case 'edit':
        $id = (int) ($_GET['id'] ?? 0);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            verify_csrf();
            $medicine->update($id, $_POST);
            header("Location: medicine_controller.php?action=list&msg=Medicine updated successfully");
            exit();
        }
        $row = $medicine->getById($id);
        if (!$row) {
            header("Location: medicine_controller.php?action=list&msg=Medicine not found");
            exit();
        }
        include 'views/medicine_edit.php';
        break;

    case 'delete':
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            verify_csrf();
            $id = (int) ($_POST['id'] ?? 0);
            $medicine->delete($id);
        }
        header("Location: medicine_controller.php?action=list&msg=Medicine deleted successfully");
        exit();

    case 'low_stock':
        $result = $medicine->getLowStock(20);
        include 'views/low_stock.php';
        break;

    default:
        $result = $medicine->getAll();
        include 'views/medicine_list.php';
}