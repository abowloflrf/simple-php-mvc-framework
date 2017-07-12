<?php
print_r(trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'));