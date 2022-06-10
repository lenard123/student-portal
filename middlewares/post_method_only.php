<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    abort(405, 'Invalid Request Method');
}