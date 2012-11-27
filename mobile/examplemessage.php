<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div data-role="page" data-theme="c">
            <?php include('header.php');?>
            <div data-role="content">
                <h3>This is the message from 'msg'</h3>
                <pre>
                <?php
                    print $_GET['msg']
                ?>
                </pre>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>