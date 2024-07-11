<?php

    $connection = mysqli_connect("localhost", "root", "","SMC");
    if (mysqli_connect_error()) {
        die(mysqli_connect_error());
    }

	if (!$connection) {
    die('Could not connect: ' . mysqli_error($con));
}
	?>