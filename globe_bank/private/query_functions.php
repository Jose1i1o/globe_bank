<?php

function find_all_subjects()
{
    global $db;

    $sql = 'SELECT * FROM subjects '; // space required or trouble shooting
    $sql .= 'ORDER BY position ASC';
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($id)
{
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . $id . "';";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an associated array
}

function find_all_pages()
{
    global $db;

    $sql = 'SELECT * FROM pages '; // space required or trouble shooting
    $sql .= 'ORDER BY subject_id ASC, position ASC';
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function insert_subject($menu_name, $position, $visible)
{
    global $db;

    $sql = 'INSERT INTO subjects ';
    $sql .= '(menu_name, position, visible) ';
    $sql .= 'VALUES (';
    $sql .= "'" . $menu_name . "',";
    $sql .= "'" . $position . "',";
    $sql .= "'" . $visible . "'";
    $sql .= ')';
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function update_subject($subject)
{
    // $result = update_subject($subject);
    global $db;

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name ='" . $subject['menu_name'] . "', ";
    $sql .= "position ='" . $subject['position'] . "', ";
    $sql .= "visible ='" . $subject['visible'] . "' ";
    $sql .= "WHERE id ='" . $subject['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // FOR UPDATE statements, $result is true or false

    if ($result) {
        return true;
    } else {
        // Update fails
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
