<?php

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];

// EITHER WE DELETE THE SUBJECT OR FIND THE SUBJECT
if (is_post_request()) {
    delete_subject($id);
    redirect_to(url_for('/staff/subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}
?>

<?php $page_title = 'Delete Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo h($subject['menu_name']); ?></p>

        <form action="<?php echo url_for('/staff/subjects/delete.php?id=' .
                            h(u($subject['id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Subject" />
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


<!-- DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`subject_id` int(11) DEFAULT NULL,
`menu_name` varchar(255) DEFAULT NULL,
`position` int(3) DEFAULT NULL,
`visible` tinyint(1) DEFAULT NULL,
`content` text,
PRIMARY KEY (`id`),
KEY `fk_subject_id` (`subject_id`)
);

INSERT INTO `pages` VALUES (1,1,'Globe Bank',1,1,NULL),(2,1,'History',2,1,NULL),(3,1,'Leadership',3,1,NULL),(4,1,'Contact Us',4,1,NULL),(5,2,'Banking',1,1,NULL),(6,2,'Credit Cards',2,1,NULL),(7,2,'Mortgages',3,1,NULL),(8,3,'Checking',1,1,NULL),(9,3,'Loans',2,1,NULL),(10,3,'Merchant Services',3,1,NULL);

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`menu_name` varchar(255) DEFAULT NULL,
`position` int(3) DEFAULT NULL,
`visible` tinyint(1) DEFAULT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `subjects` VALUES (1,'About Globe Bank',1,1),(2,'Consumer',2,1),(3,'Small Business',3,0),(5,'Commercial',4,1),(6,'Junk 3',5,0),(7,'More Junk',6,1); -->