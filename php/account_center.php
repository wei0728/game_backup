<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../assets/css/account_center.css">
        <title>account center</title>    
    </head>   
    <body>
        <header>    
            <?php session_start()?>
            <h1>Account Center</h1>
            <div class="link">
                <a href="account_center.php"><?php echo $_SESSION['last_name'].' '.$_SESSION['first_name'];?></a>
                <a href="login_page.php">logout</a>
            </div>
        </header> 
        <div class="flex">
            <div class="info-block">
                <h2>user name: </h2>
                <?php echo $_SESSION['last_name'].' '.$_SESSION['first_name'];?>
            </div>
            <div class = "info-block">
                <h2>user id:</h2>
                <?php echo $_SESSION['id'];?>
            </div>
        </div>   
        <div class="flex">
            <div class="info-block">
                <h2>rank:</h2>
                <?php echo "hello world"?>
            </div>
            <div class = "info-block-unauto">
                <div class = "flex">
                    <h2>tatal rank:</h2>
                    <button>a</button>
                </div>
                    <?php echo "hello world"?>
            </div> 
        </div>
        <div class="flex">
            <div class="edit-block">
                <a href="edit.php">edit</a>
                <a href="home_page.php">home</a>
            </div>
        </div>
    </body>
</html>