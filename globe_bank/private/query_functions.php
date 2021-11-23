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

function insert_subject($subject)
{
    global $db;

    $sql = 'INSERT INTO subjects ';
    $sql .= '(menu_name, position, visible) ';
    $sql .= 'VALUES (';
    $sql .= "'" . $subject['menu_name'] . "',";
    $sql .= "'" . $subject['position'] . "',";
    $sql .= "'" . $subject['visible'] . "'";
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

function delete_subject($id)
{

    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    // FOR DELETE STATAEMENTS, $result is true or false
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_page_by_id($id)
{
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . $id . "';";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result); // TO AN ARRAY
    mysqli_free_result($result); // FREE UP SPACE
    return $page; // returns an associated array
}

function insert_page($page)
{
    global $db;

    $sql = 'INSERT INTO pages ';
    $sql .= '(subject_id, menu_name, position, visible, content) ';
    $sql .= 'VALUES (';
    $sql .= "'" . $page['subject_id'] . "',";
    $sql .= "'" . $page['menu_name'] . "',";
    $sql .= "'" . $page['position'] . "',";
    $sql .= "'" . $page['visible'] . "',";
    $sql .= "'" . $page['content'] . "'";
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

function update_page($page)
{
    // $result = update_subject($subject);
    global $db;

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id ='" . $page['subject_id'] . "', ";
    $sql .= "menu_name ='" . $page['menu_name'] . "', ";
    $sql .= "position ='" . $page['position'] . "', ";
    $sql .= "visible ='" . $page['visible'] . "', ";
    $sql .= "content ='" . $page['content'] . "' ";
    $sql .= "WHERE id ='" . $page['id'] . "' ";
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

function delete_page($id)
{
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    // FOR DELETE STATAEMENTS, $result is true or false
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
