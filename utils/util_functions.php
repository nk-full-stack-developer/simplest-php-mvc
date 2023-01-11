<?php

/**
 * Sanitize string before outputting to HTML
 *
 * @param [string] $str
 * @return string
 */
function escapeString($str)
{
    return htmlentities($str, ENT_QUOTES, "UTF-8");
}

/**
 * Return an unsanitized string for output to HTML
 *
 * @param [string] $str
 * @return string
 */
function raw($str)
{
    return $str;
}

/**
 * Convert encoded string to HTML
 *
 * @param [string] $str
 * @return string
 */

function entitiesToHtml($str)
{
    return html_entity_decode($str);
}


/**
 * Convert table fields names to human-readable names
 *
 * @param [string] $field_name
 * @return string
 */
function humanReadbleField($field_name)
{
    $field_name = ucwords(str_replace('_', ' ', $field_name));
    return $field_name;
}

/**
 * selectCountry function : Check country selected
 * return 'selected' OR ''
 *
 * @param [string] $country
 * @return string
 */
function selectCountry($country)
{
    global $post;
    if (
        isset($post['country'])
        && !empty($post['country'])
        && $post['country'] == $country
    ) {
        return 'selected';
    }
    return '';
}

/**
 * Validate a general string
 *
 * @param [array] $errors
 * @param [string] $field
 * @param integer $min_len
 * @param integer $max_len
 * @return void
 */
function validateString(&$errors, $field, $min_len = 1, $max_len = 255)
{

    // If you were going to use $min_len and $max_len
    // $pattern = '/^[A-z\s\'\-]{' . $min_len . ',' .  $max_len . '}$/';

    if(!empty($_POST[$field])) {
        $label = humanReadbleField($field);
        if(!preg_match('/^[A-z\s\'\-]{2,}$/', $_POST[$field])) {
            $errors[$field][] = "$label must contain only letters, spaces, hyphens or apostrophies";
        }
    }
}

/**
 * Validate an email address
 *
 * @param [array] $errors
 * @param [string] $field
 * @return void
 */
function validateEmail(&$errors, $field)
{
    if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
        $errors[$field][] = 'Please enter a valid email address';
    }

}

/**
 * Validate Phone number
 *
 * @param string $field
 * @return void
 */
function validatePhone(array &$errors, string $field): void
{   
    if (!empty($_POST[$field])) {
        if (!preg_match('/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/', $_POST[$field])) {
            $label = humanReadbleField($field);
            $errors[$field][] = "{$label} must be a valid phone number.";
        }
    }
}

/**
 * Validate that two fields match
 *
 * @param array $errors
 * @param string $field1
 * @param string $field2
 * @return void
 */
function validateMatch(array &$errors, string $field1, string $field2):void
{
    $label1 = humanReadbleField($field1);
    $label2 = humanReadbleField($field2);
    if($_POST[$field1] !== $_POST[$field2]) {
        $errors[$field2][] = "$label1 does not match $label2";
    }
}

function validateRequired(array &$errors, array $required):void 
{
    // Trim white space from all POST values
    foreach($_POST as $key => $value) {
        $_POST[$key] = trim($value);
    }

    // Validate that all fields are required
    foreach($required as $field) {
        if(empty($_POST[$field])) {
            $label = humanReadbleField($field);
            $errors[$field][] = "$label is a required field";
        }
    }
}

/**
 * Validate postal code
 *
 * @param string $field
 * @return void
 */
function validatePostalcode(array &$errors, string $field): void
{
    if (!empty($_POST[$field])) {
        if (!preg_match('/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/', $_POST[$field])) {
            $label = humanReadbleField($field);
            $errors[$field][] = "{$label} is not valid postal code.";
        }
    }
}

/**
 * Validate password fields
 *
 * @param string $field
 * @return void
 */
function validatePassword(array &$errors, string $field): void
{   
    if (!empty($_POST[$field])) {
        if (!preg_match('/^\S*(?=\S{8,})(?=\S*\d)(?=\S*[A-Z])(?=\S*[a-z])?(?=\S*[!@#$%^&*? ])\S*$/', $_POST[$field])) {
            $errors[$field][] = 'Password must have minimum 8 character, at least 1 capital letter, and at least 1 special character.';
        }
    }
}

/**
 * Return Validation error for form field
 *
 * @param [string] $field_name
 * @return string
 */
function showValidationError($field_name)
{
    global $errors;
    if (!empty($errors[$field_name])) {
        return $errors[$field_name][0];
    }
    return '';
}