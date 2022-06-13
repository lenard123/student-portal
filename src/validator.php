<?php

use Rakit\Validation\Validator;

function validate_request($rules)
{
    $validator = new Validator;

    $validation = $validator->make($_POST + $_FILES, $rules);

    $validation->validate();

    if ($validation->fails()) {

        $errors = $validation->errors();

        abort($errors->all(), 422, $errors->toArray());
    }
}