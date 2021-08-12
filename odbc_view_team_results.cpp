/* Compile using:
g++ -Wall -I/usr/include/cppconn -o odbc odbc_view_team_results.cpp -L/usr/lib -lmysqlcppconn 
run: 
./odbc */
#include "odbc_db.h"
#include <iostream>
#include <string>
using namespace std;

int main(int argc, char *argv[])
{
string Username = "ptmccorm";            // Change to your own username
string mysqlPassword = "pheiF9ch";  // Change to your mysql password
string SchemaName = "ptmccorm";          // Change to your username

   odbc_db myDB;
   myDB.Connect(Username, mysqlPassword, SchemaName);
   myDB.initDatabase();
 
   //assign argv[1] to teamID variable
   //string teamID = "";
   string nickname = "";
   //teamID = argv[1];
   nickname = argv[1];
   nickname = "\"" + nickname + "\"";
   
   // Print School name and Nickname for school
   string builder = "";
   string query1 = "SELECT UNIVERSITY_NAME,NICKNAME FROM TEAM WHERE NICKNAME = " + nickname+ ";";
   builder.append("Team Selected:" + myDB.query(query1) + "<br>");
   string query2 = "SELECT G.GAME_ID,HOME_TEAM, OPPONENT, PLAY_DATE, SCORE_ONE, SCORE_TWO FROM GAME G LEFT JOIN RESULT R ON G.GAME_ID = R.GAME_ID WHERE G.HOME_TEAM = " + nickname + ";";
   string query3 = "SELECT GAME_ID AS HOME_GAMES_WON FROM RESULT WHERE (SCORE_ONE > SCORE_TWO) AND TEAM1_ID = (SELECT TEAM_ID FROM TEAM WHERE NICKNAME = "+nickname+");";
   string query4 = "SELECT GAME_ID AS HOME_GAMES_LOST FROM RESULT WHERE (SCORE_ONE < SCORE_TWO) AND TEAM1_ID = (SELECT TEAM_ID FROM TEAM WHERE NICKNAME = "+nickname+");";
   builder.append("Home Games For The " + nickname + ": <br>" + myDB.query(query2) + "<br>" + "Home Games Won:<br>" + myDB.query(query3) + "<br>Home Games Lost:<br>" + myDB.query(query4) + "<br>");
   string query5 = "SELECT G.GAME_ID,HOME_TEAM, OPPONENT, PLAY_DATE, SCORE_ONE,SCORE_TWO FROM GAME G LEFT JOIN RESULT R ON G.GAME_ID = R.GAME_ID WHERE G.OPPONENT = " + nickname + ";";
   string query6 = "SELECT GAME_ID AS AWAY_GAMES_WON FROM RESULT WHERE (SCORE_ONE < SCORE_TWO) AND TEAM2_ID = (SELECT TEAM_ID FROM TEAM WHERE NICKNAME = "+nickname+");";
   string query7 = "SELECT GAME_ID AS AWAY_GAMES_LOST FROM RESULT WHERE (SCORE_ONE > SCORE_TWO) AND TEAM2_ID = (SELECT TEAM_ID FROM TEAM WHERE NICKNAME = "+nickname+");";
   builder.append("Away Games for the " + nickname + ": <br>" + myDB.query(query5) + "<br>Away Games Won:<br>" + myDB.query(query6) + "<br>Away Games Lost:<br>" + myDB.query(query7) + "<br>");   
   cout << builder;
       
   myDB.disConnect();//disconect Database

   return 0;
}