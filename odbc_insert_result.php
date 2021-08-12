<html>
<body>
<h3>Enter results of a college game to add to the database:</h3>

<form action="odbc_insert_result.php" method="post">
    Game ID: <input type="text" name="gameID"><br>
	Team One ID: <input type="text" name="team1_id"><br>
    Team Two ID: <input type="text" name="team2_id"><br>
    Team One Score: <input type="text" name="score1"><br>
	Team Two Score: <input type="text" name="score2"><br>
	Winning Team(nickname): <input type="text" name="winner"><br>
    <input name="submit" type="submit" >
</form>
<form action="odbc_insert_result.php" method="post">
	<button action="odbc_insert_result.php" name="showGames" type="submit">Click to Show Games</button>
</form>
<form action="odbc_insert_result.php" method="post">
	<button action="odbc_insert_result.cpp" name="showTeams" type="submit">Click to Show Teams</button>
</form>
<form action="project_home.php" method="post">
	<button name="returnHome" type="submit">Click to Return to Home Page</button>
</form>
<br>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $gameID = escapeshellarg($_POST[gameID]);
	$team1_id = escapeshellarg($_POST[team1_id]);
    $team2_id = escapeshellarg($_POST[team2_id]);
    $score1 = escapeshellarg($_POST[score1]);
	$score2 = escapeshellarg($_POST[score2]);
	$winner = escapeshellarg($_POST[winner]);

    $command = '/home/ptmccorm/public_html/project_cpp/odbc_insert_result.exe ' . $gameID . ' ' . $team1_id . ' ' . $team2_id . ' ' . $score1 . ' ' . $score2. ' ' . $winner;

    //echo '<p>' . 'command: ' . $command . '<p>';
    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
 
    // run odbc_insert_result.exe
    system($command);           
}
if(isset($_POST['showGames']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_show_game.exe ';
	$command = escapeshellcmd($command);
	system($command);
}
if(isset($_POST['showTeams']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_show_team.exe ';
	$command = escapeshellcmd($command);
	system($command);
}
if(isset($_POST['returnHome']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/project_home.php ';
	
    // remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	//run odbc_insert_result.exe
	system($command);
}
?>


