<?php
include 'Config\connect.php';
$success = '';
$sql = 'SELECT* FROM products ORDER BY type';
$result = mysqli_query($conn, $sql);
$produse = mysqli_fetch_all($result,   MYSQLI_ASSOC);
mysqli_free_result($result);
if (isset($_GET['productID']))
{
    if ($_SESSION['userid'] != '0')
    {
        echo "GOOD";
        $userid = $_SESSION['userid'];
        $productid = $_GET['productID'];
        $cart_sql = "INSERT INTO cart(IDuser, IDproduct) VALUES('$userid', '$productid')"; 
        if (!mysqli_query($conn, $cart_sql))
            echo 'query error: '. mysqli_error($conn);
        else
        {
            $success = "Product added successfully";
            header("Location: index.php");
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<?php include 'Templates\header.php'; ?>
<table class="products-table">
<?php foreach ($produse as $produs): 
    if ($produs["ID"] % 4 == 0):
?>
    <tr>
        <td><img src=<?php echo $produs['imagelocation'];?> alt="Laptop"></td>
        <td><?php echo $produs['name'] ?> </td>
        <td><?php echo $produs['price'] ?> </td>
        <td>
            <?php $cart_buy = "index.php?productID=" . $produs["ID"]; ?>
            <a href = <?php echo $cart_buy; ?>>
            <button class = "add-to-cart">Add to Cart</button>
        </a>
        </td>
    </tr>
<?php endif; endforeach;?>
</table>
</html>