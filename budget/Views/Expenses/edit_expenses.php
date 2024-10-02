<?php
session_start();
require_once(__DIR__ . '/../../Database/config.php');
require_once(__DIR__ . '/../../Controllers/expenses.php');
$showAllExp = "SELECT * FROM expenses WHERE id = '" . $_GET['id'] . "'";
$result = mysqli_query($connect, $showAllExp)
    or die(mysqli_error($connect));
$row = mysqli_fetch_array($result);    
if(isset($_POST['edit'])){
    $expId = $_GET['id'];
    $date = $_POST['exp_date'];
    $name = $_POST['exp_name'];
    $amount = $_POST['exp_amount'];
    $result = editExpenses($expId, $date, $name, $amount);
    if($result){
        echo "<script>alert('Record edit successfully.');</script>";
        echo "<script>window.location.href='/budget/Views/Expenses/index_expenses.php'</script>";
    } else {
        echo "<script>alert('Something goes wrong!');</script>";
        echo "<script>window.location.href='/budget/Views/Expenses/index_expenses.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Expenses</title>
    </head>
    <body>
        <h1 align="center">Budget Managemen System</h1>
        <h2>Edit Record</h2>
        <form action='' method="post">
            <table border="0">
                <tr>
                    <td>Date</td>
                    <td>
                        <input type="date" name="exp_date" value="<?php echo $row['exp_date']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Name of Expense</td>
                    <td>
                        <input type="text" name="exp_name" value="<?php echo $row['exp_name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>
                        <input type="number" name="exp_amount" value="<?php echo $row['exp_amount']; ?>" step=".01">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit" value="Edit Record">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>