<html>
<body>
<h2>Welcome to the College Basketball Team Database Home Page</h2>
<p>Please Select One of the Following Menu Options:</p>

<style>
	h1 {text-align: center;}
</style>

<form action="odbc_insert_team.php" method="post">
	<button name="insertTeam" type="submit">Insert a Team</button>
</form>
<form action="odbc_insert_game.php" method="post">
	<button name="insertGame" type="submit">Insert a Game</button>
</form>
<form action="odbc_insert_result.php" method="post">
	<button name="insertResult" type="submit">Insert a Result</button>
</form>
<form action="odbc_show_team.php" method="post">
	<button name="viewTeams" type="submit">View All Teams in Database</button>
</form>
<form action="odbc_view_team_results.php" method="post">
	<button name="viewTeamResults" type="submit">Display Results for Specific Team</button>
</form>
<form action="odbc_view_date_results.php" method="post">
	<button name="viewDateResults" type="submit">Display Results for Specific Game Date</button>
</form>

<br>

</body>
</html>

<?php
if (isset($_POST['insertTeam'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $command = '/home/ptmccorm/public_html/project_cpp/odbc_insert_team.php ';

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
 
    // run odbc_insert_team.exe
    system($command);           
}
if(isset($_POST['insertGame']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_insert_game.php ';
	
	// remove dangerous characters from command to protect web server
	$command = escapeshellcmd($command);
	
	//run odbc_insert_game.exe
	system($command);
}
if(isset($_POST['insertResult']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_insert_result.php ';
	
    // remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	//run odbc_insert_result.exe
	system($command);
}
if(isset($_POST['viewTeams']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_show_team.php ';
	
    // remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	//run odbc_insert_result.exe
	system($command);
}
if(isset($_POST['viewTeamResults']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_view_team_results.php ';
	
    // remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	//run odbc_insert_result.exe
	system($command);
}
if(isset($_POST['viewDateResults']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_view_date_results.php ';
	
    // remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	//run odbc_insert_result.exe
	system($command);
}
?>