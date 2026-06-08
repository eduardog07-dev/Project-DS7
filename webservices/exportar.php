<?php

header('Content-Type: application/json');

echo json_encode([
    "estado" => "ok",
    "mensaje" => "Exportación pendiente"
]);