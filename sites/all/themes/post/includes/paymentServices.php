<html>
	<head>
	</head>
	<body>
        <h1>Payment Services</h1>
        <?php
            $sub = $_GET['sid'];
            $dom = $_GET['dom'];
        ?>
        <p><a href="obox-submit.php?sid=<?php print $sub; ?>&dom=<?php print $dom; ?>">Submit form for SID = <?php print $sub; ?></a></p>
	</body>
</html>
