# Rock-Paper-Scissors-Game-in-PHP
Rock Paper Scissors is a hand game usually played between two people, in which each player simultaneously forms one of three shapes with an outstretched hand. These shapes are "rock" (a closed fist), "paper" (a flat hand), and "scissors" (a fist with the index finger and middle finger extended, forming a V). "Scissors" is identical to the two-fingered V sign (also indicating "victory" or "peace") except that it is pointed horizontally instead of being held upright in the air.


This is a simple web application I developed as assignment from "Building Web Applications in PHP" course provided by Michigan University in Coursera.

Assignment Specification: Rock Paper Scissors

The login.php should be a login screen should present a field for the person's name (name="who") and their password (name="pass"). Your form should have a button labeled "Log In" that submits the form data using method="POST" (i.e. these should not be GET parameters).

The login screen needs to have some error checking on its input data. If either the name or the password field is blank, you should put up a message of the form:

     User name and password are required

If the password is non-blank and incorrect, you should put up a message of the form:

     Incorrect password

If there are errors, you should come back to the login screen (login.php) and show the error with blank input fields (i.e. don't carry over the values for name="who" and name="pass" fields from the previous post).

You are to use a "salted hash" for the password. The "plaintext" of the password is not to be present in your application source code except in comments. For this assignment, we will be using the following values for the salt and stored hash:

     $salt = 'XyZzy12*_';

     $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

The stored_hash is the MD5 of the salt concatenated with the plaintext of php123 - which is the password. This is computed using the following PHP:

     $md5 = hash('md5', 'XyZzy12*_php123');

In order to check an incoming password you must concatenate the salt plus password together and then run that through the hash() function and compare it to the stored_hash.

If the incoming password, properly hashed matches the stored stored_hash value, the user's browser is redirected to the game.php page with the user's name as a GET parameter using:

     header("Location: game.php?name=".urlencode($_POST['who']));

Specifications of the Game Playing Screen
In order to protect the game from being played without the user properly logging in, the game.php must first check the session to see if the user's name is set and if the user's name is not set in the session the game.php must stop immediately using the PHP die() function:

     die("Name parameter missing");

To test, navigate to game.php manually without logging in - it should fail with "Name parameter missing".

If the user is logged in, they should be presented with a drop-down menu showing the options Rock, Paper, Scissors, and Test as well as buttons labeled "Play" and "Logout".


If the Logout button is pressed the user should be redirected back to the index.php page using:

     header('Location: index.php');

If the user selects, Rock, Paper, or Scissors and presses "Play", the game chooses random computer throw, and scores the game and prints out the result of the game:

     Your Play=Paper Computer Play=Paper Result=Tie
