<?php require_once('config.php');

if(!empty($_POST['comment'])) {
    $author = (!empty($_POST['author'])) ? trim($_POST['author']) : 'Anonymous';
    $stmt = $dbConn->prepare('INSERT INTO comments(`author`, `comment`) VALUES(:author, :comment)');
    $stmt->execute(array('author' => $author, 'comment' => $_POST['comment']));
    header("location: /index.php");
}

$stmt = $dbConn->prepare('SELECT author, comment, created_at FROM comments ORDER BY id DESC');
$stmt->execute();
$comments = $stmt->fetchAll();
;?>

<title>Comments Page</title>
<link rel='stylesheet' href='style.css'>

<div id='comments-header'>
    <h1></h1>
</div>
<div id='comments-form'>
    <h3>Please add your comments</h3>
    <form method='post'>
        <div>
            <div>
                <input type="text" name="author" placeholder="Enter your name">
            </div>
            <div>
                <textarea name='comment' placeholder="Enter your comment"></textarea>
            </div>
            <div>
                <br>
                <input type='submit' name='submit' value='Save'>
            </div>
        </div>
    </form>
</div>
<div id='comments-panel'>
    <h3>Comments:</h3>
    <?php foreach ($comments as $comment): ?>
        <p><?=$comment['comment']?>
            <span class='comment-date comment-author'>
                (<?=$comment['author']?>, <?=$comment['created_at'];?>)
            </span>
        </p>
    <?php endforeach; ?>
</div>