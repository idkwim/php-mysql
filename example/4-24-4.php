<?php
    function print_title() {
        if(isset($_GET['id'])) {
            echo $_GET['id'];
        } else {
            echo "Welcome";
        }
    }

    function print_description() {
        if(isset($_GET['id'])) {
            echo file_get_contents("data/".$_GET['id']);
        } else {
            echo "Hello, PHP";
        }
    }

    function print_list() {
        $list = scandir('./data');
        $i = 0;
        while($i < count($list)) {
            if($list[$i] != '.') {
                if($list[$i] != '..') {
                    echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
                }
            }
            $i = $i + 1;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php
                print_title();
            ?>
        </title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <?php
                print_list();
            ?>
        </ol>
        <a href="create.php">create</a>
        <?php if(isset($_GET['id'])) { ?>
            <a href="update.php?id=<?= $_GET['id']; ?>">update</a>
        <?php } ?>
        <form action="create_process.php" method="post">
            <p>
                <input type="text" name="title" placeholder="Title" />
            </p>
            <p>
                <textarea name="description" placeholder="Description"></textarea>
            </p>
            <p>
                <input type="submit" value="Submit" />
            </p>
        </form>
    </body>
</html>