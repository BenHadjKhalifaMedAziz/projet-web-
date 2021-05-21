<?php
if (isset($_GET['id'])) {
    $test = $_GET['id'];
}
?>
<html>

<head>
</head>

<body>
    <form action="get">
        <input type="hidden" name="id">
    </form>
</body>

</html>