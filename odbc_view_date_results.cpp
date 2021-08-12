/* Compile using:
g++ -Wall -I/usr/include/cppconn -o odbc odbc_view_team_results.cpp -L/usr/lib -lmysqlcppconn
run:
./odbc */
#include "odbc_db.h"
#include <iostream>
#include <string>
using namespace std;

int main(int argc, char* argv[])
{
    string Username = "ptmccorm";            // Change to your own username
    string mysqlPassword = "pheiF9ch";  // Change to your mysql password
    string SchemaName = "ptmccorm";          // Change to your username

    odbc_db myDB;
    myDB.Connect(Username, mysqlPassword, SchemaName);
    myDB.initDatabase();

    //assign argv[1] 
    string date = "";
    //date = argv[1];
    date = argv[1];
    date = "\"" + date + "\"";

   //Display the Team name, nicknames, location, and scores for the teams involved. Clearly indicate the winner.
    string builder = "";
    string query1 = "SELECT HOME_TEAM, OPPONENT, LOCATION FROM GAME WHERE PLAY_DATE = " + date + ";";
    builder.append("<br> Query1: " + query1 + "<br>");
    builder.append("Team Selected:" + myDB.query(query1) + "<br>");
    string query2 = "SELECT T1.UNIVERSITY_NAME, T2.UNIVERSITY_NAME, R.SCORE_ONE, R.SCORE_TWO, WINNER FROM RESULT R LEFT JOIN GAME G ON R.GAME_ID = G.GAME_ID LEFT JOIN TEAM T1 ON R.TEAM1_ID = T1.TEAM_ID LEFT JOIN TEAM T2 ON TEAM2_ID = T2.TEAM_ID WHERE G.PLAY_DATE = " + date + ";";
    builder.append("Results: " + myDB.query(query2) + "<br>");
    cout << builder;

    myDB.disConnect();//disconect Database

    return 0;
}





