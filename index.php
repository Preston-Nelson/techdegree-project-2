<?php include('inc/quiz.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <p class="breadcrumbs"><?php echo "Question " . count($_SESSION['already_asked']) . " of " . $number_of_questions; ?></p>
            <p class="quiz"><?php echo "What is " . $current_question["leftAdder"] . " + " . $current_question["rightAdder"] . " ?"; ?></p>
            <form action="inc/quiz.php" method="post">
                <input type="hidden" name="id" value="0" />
                <input type="submit" class="btn" name="answer" value="<?php echo $current_question["correctAnswer"]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $current_question["correctAnswer"]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $current_question["correctAnswer"]; ?>" />
            </form>
        </div>
    </div>
</body>
</html>