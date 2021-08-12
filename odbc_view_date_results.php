<html>
<body>
<h3>Collegiate Basketball Team Information</h3>
<p>Click the "Display all Games" button to view a list of game dates to choose from:</p>
      
<form action="odbc_view_date_results.php" method="post">
	Insert Game Date (year-month-day): <input type="text" name="date"><br>
    <input name="submitGameDate" type="submit" >
</form>

<form action="odbc_view_date_results.php" method="post">
	<button name="showGames" type="submit">Display all Games</button>
</form>	  
<form action="project_home.php" method="post">
	<button name="returnHome" type="submit">Return to Home Page</button>
</form>
<br>

</body>
</html>

<?php
if(isset($_POST['submitGameDate']))
{
	$date = escapeshellarg($_POST[date]);
	
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_view_date_results.exe ' . $date;
	
	// remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	// run odbc_view_team_results.exe
	system($command);
}
if(isset($_POST['showGames']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_show_game.exe ';
	$command = escapeshellcmd($command);
	system($command);
}
if(isset($_POST['returnHome']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/project_home.php';
	
    // remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	//return to Project Home Page
	system($command);
}
?>