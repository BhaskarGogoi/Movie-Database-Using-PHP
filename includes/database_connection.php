<?php

$conn = mysqli_connect("localhost", "root", "", "moviedatabase");

if (!$conn) {
	die("Connection Failed: ".mysqli_connect_error());
}