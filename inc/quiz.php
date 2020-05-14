<?php
// Start the session
session_start();

// Include questions from the questions.php file
include('questions.php');

// Make a variable to hold the total number of questions to ask
$number_of_questions = count($questions);

// Make a variable to hold the toast message and set it to an empty string
$toast_message = "";

// Make a variable to determine if the score will be shown or not. Set it to false.
$show_score = false;

// Make a variable to hold a random index. Assign null to it.
$index = null;

// Make a variable to hold the current question. Assign null to it.
$current_question = null;

/*
    If the server request was of type POST
        Check if the user's answer was equal to the correct answer.
        If it was correct:
            1. Assign a congratulutory string to the toast variable
            2. Ancrement the session variable that holds the total number correct by one.
        Otherwise:
            1. Assign a bummer message to the toast variable.
*/

// https://stackoverflow.com/questions/1372147/check-whether-a-request-is-get-or-post
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($questions[end($_SESSION['already_asked'])]['correctAnswer'] == $_POST['answer']) {
        $toast_message = "Correct answer!!";
        $_SESSION['correct_answers']++;
    } else {
        $toast_message = "Wrong answer...";
    }
}

/*
    Check if a session variable has ever been set/created to hold the indexes of questions already asked.
    If it has NOT: 
        1. Create a session variable to hold used indexes and initialize it to an empty array.
        2. Set the show score variable to false.
*/
if(!isset($_SESSION['already_asked'])) {
    $_SESSION['already_asked'] = [];
    $show_score = false;
}


/*
  If the number of used indexes in our session variable is equal to the total number of questions
  to be asked:
        1.  Reset the session variable for used indexes to an empty array 
        2.  Set the show score variable to true.
*/
if(count($_SESSION['already_asked']) > $number_of_questions-1) {
    $_SESSION['already_asked'] = [];
    $show_score = true;
}
/*
  Else:
    1. Set the show score variable to false 
    2. If it's the first question of the round:
        a. Set a session variable that holds the total correct to 0. 
        b. Set the toast variable to an empty string.
        c. Assign a random number to a variable to hold an index. Continue doing this                   
            for as long as the number generated is found in the session variable that holds used indexes.
        d. Add the random number generated to the used indexes session variable.      
        e. Set the individual question variable to be a question from the questions array and use the index
            stored in the variable in step c as the index.
        f. Create a variable to hold the number of items in the session variable that holds used indexes
        g. Create a new variable that holds an array. The array should contain the correctAnswer,
            firstIncorrectAnswer, and secondIncorrect answer from the variable in step e.
        h. Shuffle the array from step g.
*/
else {
    $show_score = false;
    if(count($_SESSION['already_asked']) == 0) {
        //A
        $_SESSION['correct_answers'] = 0;

        //B
        $toast_message = '';

        //C
        $random_question = rand(0, $number_of_questions-1);
        while(in_array($random_question, $_SESSION['already_asked'])) {
            $random_question = rand(0, $number_of_questions-1);
        }

        //D
        $_SESSION['already_asked'][] = $random_question;

        //E
        $current_question = $questions[$random_question];

        //F
        $number_of_used_questions = count($_SESSION['already_asked']);

        //G
        $answers = [
            0 => $current_question['correctAnswer'],
            1 => $current_question['firstIncorrectAnswer'],
            2 => $current_question['secondIncorrectAnswer']
        ];

        //H
        shuffle($answers);
    } else {
        $random_question = rand(0, $number_of_questions-1);
        while(in_array($random_question, $_SESSION['already_asked'])) {
            $random_question = rand(0, $number_of_questions-1);
        }

        $_SESSION['already_asked'][] = $random_question;

        $current_question = $questions[$random_question];

        $number_of_used_questions = count($_SESSION['already_asked']);

        $answers = [
            0 => $current_question['correctAnswer'],
            1 => $current_question['firstIncorrectAnswer'],
            2 => $current_question['secondIncorrectAnswer']
        ];

        shuffle($answers);
    }
}

?>