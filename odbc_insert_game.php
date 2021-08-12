<html>
<body>
<h3>Enter information about a college game to add to the database:</h3>

<form action="odbc_insert_game.php" method="post">
    Nickname of Home Team: <input type="text" name="homeTeam"><br>
	Nickname of Away Team: <input type="text" name="opponent"><br>
    Location of game: <input type="text" name="location"><br>
	Date(year-month-day): <input type="text" name="playDate"><br>
    <input name="submit" type="submit" >
</form>
<form action="odbc_insert_game.php" method="post">
	<button action="odbc_insert_game.cpp" name="showTeams" type="submit">Show Teams</button>
</form>
<form action="project_home.php" method="post">
	<button name="returnHome" type="submit">Return to Home Page</button>
</form>
<br>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $homeTeam = escapeshellarg($_POST[homeTeam]);
    $opponent = escapeshellarg($_POST[opponent]);
	$location = escapeshellarg($_POST[location]);
	$playDate = escapeshellarg($_POST[playDate]);

    $command = '/home/ptmccorm/public_html/project_cpp/odbc_insert_game.exe ' . $homeTeam . ' ' . $opponent . ' ' . $location . ' ' . $playDate;

    //echo '<p>' . 'command: ' . $command . '<p>';
    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
 
    // run odbc_insert_game.exe
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


