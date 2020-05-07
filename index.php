<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Math Quiz: Addition</title>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <?php include('inc/quiz.php'); ?>
        <p> <?php echo $toast_message ?> </p>
    </head>
    <body>
        <div class="container"></div>
            <div id="quiz-box">
                <p class="breadcrumbs">
                    <?php echo "Question " . (count($_SESSION['already_asked'])) . " of " . ($number_of_questions+1); ?>
                </p>
                <p class="quiz">
                    <?php echo "What is " . $current_question["leftAdder"] . " + " . $current_question["rightAdder"] . " ?"; ?>
                </p>
                <form action="" method="post">
                    <div id="toast" opacity=100%>
                        <?php echo $toast_message ?>
                    </div>
                    <input type="hidden" name="id" value="0" />
                    <input type="submit" class="btn" name="answer" value="<?php echo $answers[0]; ?>" />
                    <input type="submit" class="btn" name="answer" value="<?php echo $answers[1]; ?>" />
                    <input type="submit" class="btn" name="answer" value="<?php echo $answers[2]; ?>" />
                </form>
            </div>
        </div>
    </body>
</html>