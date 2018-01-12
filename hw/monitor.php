<?php header("content-type: text/plain"); ?>
<?php echo "Hello ADCs! PHP is successfully running v".phpversion()." :)\n"; ?>
http.host: <?php echo $_SERVER["HTTP_HOST"], "\n"; ?>
<?php if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { echo "http.x_forwarded_for: ", $_SERVER["HTTP_X_FORWARDED_FOR"]; } else { echo "ip.src: ", $_SERVER["REMOTE_ADDR"]; } ?> 
ip.dst: <?php echo $_SERVER["SERVER_ADDR"], "\n"; ?>
