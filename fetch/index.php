<?php



$secret = $_GET["key"];

if($secret !== "Ashhad9799") {	
	
	http_response_code(403);
	echo "Forbidden";
	exit;
}

$command = "cd /opt/malabar-telegram-bot && /opt/malabar-telegram-bot/.venv/bin/python main.py 2>&1";

$output = shell_exec($command);

header("Content-Type: text/plain");
echo $output;


