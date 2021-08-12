<html>
<body>
<h3>Enter information about a college team to add to the database:</h3>

<form action="odbc_insert_team.php" method="post">
    University_Name: <input type="text" name="university_name"><br>
    Nickname: <input type="text" name="nickname"><br>
    Rank: <input type="text" name="rank"><br>
    <input name="submit" type="submit" >
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
    $university_name = escapeshellarg($_POST[university_name]);
    $nickname = escapeshellarg($_POST[nickname]);
    $rank = escapeshellarg($_POST[rank]);

    $command = '/home/ptmccorm/public_html/project_cpp/odbc_insert_team.exe ' . $university_name . ' ' . $nickname . ' ' . $rank;

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
 
    // run odbc_insert_team.exe
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


