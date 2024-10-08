<?php
session_start();
require_once(__DIR__ . '/../../Database/config.php');
require_once(__DIR__ . '/../../Controllers/incomes.php');
$sql = "SELECT * FROM incomes WHERE id = '" . $_GET['id'] . "'";
$result_edit = mysqli_query($connect, $sql)
    or die(mysqli_error($connect));
$row_edit = mysqli_fetch_array($result_edit);    
if(isset($_POST['edit_income'])){
    $id = $_GET['id'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $result = editIncome($id, $date, $name, $amount);
    if($result){
        echo "<script>alert('Record updated successfully!');</script>";
        echo "<script>window.location.href='/budget/Views/Incomes/income_index.php'</script>";
    } else {
        echo "<script>alert('Something goes wrong!');</script>";
        echo "<script>window.location.href='/budget/Views/Incomes/income_index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>Incomes</title>
        <link rel="stylesheet" type="text/css" href="/budget/Styles/style.css">
    </head>
    <body>
    <div class="header">
            <h1>Budget Management System</h1>
            <h2>Edit Income</h2>
            <div class="header-right">
                <a href="/budget/Views/Incomes/income_index.php">Back to Income Page</a><br>
                <?php echo $_SESSION['fullname']; ?>
            </div>
        </div>
        <form action='' method="post">
            <table class="center">
                <tr>
                    <td>Date</td>
                    <td>
                        <input type="date" name="date" value="<?php echo $row_edit['income_date']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Name of Income</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $row_edit['income_name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>
                        <input type="number" name="amount" value="<?php echo $row_edit['income_amount']; ?>">
                    </td>    
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit_income" value="Edit Record">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
