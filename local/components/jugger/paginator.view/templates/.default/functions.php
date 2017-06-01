<?php

function getLinkByPage(int $page, string $paramName) {
    $params = array_merge($_GET, [
        $paramName => $page,
    ]);
    return "?". http_build_query($params);
}
