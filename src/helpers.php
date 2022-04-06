<?php

function get_builder($builder) {
    return json_decode(json_encode($builder), true);
}