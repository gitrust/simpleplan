
<?php
if (if('login' != $_GET['page'])) {
?>

echo "<a class='button button-primary' href='index.php?page=login'>Home</a>"
echo "<a class='button button-primary' href='index.php?page=admin'>Administration</a>"
echo "<a class='button button-primary' href='index.php?page=termine'>Termine</a>"

<?php
}
?>