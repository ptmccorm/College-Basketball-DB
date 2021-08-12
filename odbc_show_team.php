<html>
<body>
<h3>Collegiate Basketball Teams:</h3>
<form action="odbc_show_team.php" method="post">
	<button name="displayTeams" type="submit">Display All Teams</button>
</form>
<form action="project_home.php" method="post">
	<button name="returnHome" type="submit">Return to Home Page</button>
</form>
<br>

</body>
</html>

<?php
if (isset($_POST['displayTeams'])) 
{
    $command = '/home/ptmccorm/public_html/project_cpp/odbc_show_team.exe ';

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
 
    // run odbc_insert_team.exe
    system($command);           
}
if(isset($_POST['returnHome']))
{
	$command = '/home/ptmccorm/public_html/project_cpp/project_home.php';
	
    // remove dangerous characters from command to protect web server	
	$command = escapeshellcmd($command);
	
	//run odbc_insert_result.exe
	system($command);
}
?>
