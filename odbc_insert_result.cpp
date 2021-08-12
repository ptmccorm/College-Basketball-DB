/* Compile using:
g++ -Wall -I/usr/include/cppconn -o odbc odbc_insert_team.cpp -L/usr/lib -lmysqlcppconn 
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
   
   // For debugging purposes:  Show the database before insert
   string builder = "";
   string query1 = "SELECT * from RESULT;";
   builder.append("<br> RESULT table before:" + myDB.query(query1) +"<br>");
 
   // Parse input string to get Team University Name and Nickname and Rank
   string gameID = "5";
   string team1_id = "TEAM1_ID";
   string team2_id = "TEAM2_ID";
   string score1 = "SCORE1";
   string score2 = "SCORE2";
   string winner = "WINNER";

   // Read command line arguments
   // First arg, arg[0] is the name of the program
   // Next args are the parameters
   gameID = argv[1];
   team1_id = argv[2];
   team2_id = argv[3];
   score1 = argv[4];
   score2 = argv[5];
   winner = argv[6];
    
   // Insert the new team
   string input = gameID + "," + team1_id + "," + team2_id + "," + score1 + "," + score2 + "," + winner;
   myDB.insert("RESULT", input);    // insert new college sports team
 
   //For debugging purposes: Show the database after insert
   builder.append("<br><br> Table RESULT after:" + myDB.query(query1));
   cout << builder; 
       
   myDB.disConnect();//disconect Database

   return 0;
}