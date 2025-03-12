<?php
require __DIR__ . '/../config/env.config.php';

echo "Host: " . $ENVCONFIG['APP']['HOST'] . "<br>";
echo "Port: " . $ENVCONFIG['APP']['PORT'] . "<br>";
echo "Database Host: " . $ENVCONFIG['DB']['HOST'] . "<br>";
echo "Database Port: " . $ENVCONFIG['DB']['PORT'] . "<br>";
echo "Database Name: " . $ENVCONFIG['DB']['NAME'] . "<br>";
echo "Username: " . $ENVCONFIG['DB']['USERNAME'] . "<br>";
echo "Password: " . $ENVCONFIG['DB']['PASSWORD'] . "<br>";
