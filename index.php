<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Math Quiz: Addition</title>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <?php include('inc/quiz.php'); ?>
    </head>
    <body>
        <div class="container"></div>
        <?php
            $left_adder = $current_question["leftAdder"];
            $right_adder = $current_question["rightAdder"];
            if($show_score) {
                $score = $_SESSION['correct_answers'];
                echo "<div id=\"quiz-box\">
                        <p>
                            You got
                            $score out of $number_of_questions
                            correct.
                        </p>";
                
                if($score-$number_of_questions==0) {
                    echo "<p>
                            Well done!
                        </p>";
                }
                echo "
                <form action=\"\" method=\"post\">
                    <input type=\"hidden\" name=\"id\" value=\"1\" />
                    <input type=\"submit\" class=\"btn\" name=\"answer\" value=\"Restart Quizz\" />
                </form>
                ";
                echo "</div>";
            } else {
                echo "
                <div id=\"quiz-box\">
                    <p class=\"quiz\">
                        What is $left_adder + $right_adder?
                    </p>
                    <form action=\"\" method=\"post\">
                        <input type=\"hidden\" name=\"id\" value=\"0\" />
                        <input type=\"submit\" class=\"btn\" name=\"answer\" value=\"$answers[0]\" />
                        <input type=\"submit\" class=\"btn\" name=\"answer\" value=\"$answers[1]\" />
                        <input type=\"submit\" class=\"btn\" name=\"answer\" value=\"$answers[2]\" />
                    </form>
                    <p>$toast_message</p>
                </div>";
            }
        ?>
        </div>
    </body>
</html>