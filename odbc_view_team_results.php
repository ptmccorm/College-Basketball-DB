<html>
<body>
<h3>Collegiate Basketball Team Information</h3>
<p>Click the "Display All Teams" button to view a list of teams to choose from:</p>
      
<form action="odbc_view_team_results.php" method="post">
	Insert Team Nickname: <input type="text" name="nickname"><br>
    <input name="submitTeamName" type="submit" >
</form>

<form action="odbc_view_team_results.php" method="post">
	<button name="displayTeams" type="submit">Display All Teams</button>
</form>	  
<form action="project_home.php" method="post">
	<button name="returnHome" type="submit">Return to Home Page</button>
</form>
<br>

</body>
</html>

<?php
if(isset($_POST['submitTeamName']))
{
	$nickname = escapeshellarg($_POST[nickname]);
	
	$command = '/home/ptmccorm/public_html/project_cpp/odbc_view_team_results.exe ' . $nickname;
	
	// remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	// run odbc_view_team_results.exe
	system($command);
}
if (isset($_POST['displayTeams'])) 
{
    $command = '/home/ptmccorm/public_html/project_cpp/odbc_show_team.exe ';

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
 
    // run odbc_show_team.exe
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