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
   string query1 = "SELECT * from GAME;";
   builder.append("<br> GAME table before:" + myDB.query(query1) +"<br>");
 
   // Parse input string to get Team University Name and Nickname and Rank
   //string gameID = "4";
   string homeTeam = "HOMETEAM";
   string opponent = "OPPONENT";
   string location = "LOCATION";
   string playDate = "PLAYDATE";

   // Read command line arguments
   // First arg, arg[0] is the name of the program
   // Next args are the parameters
   homeTeam = argv[1];
   opponent = argv[2];
   location = argv[3];
   playDate = argv[4];
    
   // Insert the new team
   string input = "'" + homeTeam + "','" + opponent + "','" + location + "','" + playDate + "'";               
   myDB.insert("GAME", input);    // insert new college sports team
 
   //For debugging purposes: Show the database after insert
   builder.append("values = " + input + "<br>");
   builder.append("<br><br> Table GAME after:" + myDB.query(query1));
   cout << builder; 
       
   myDB.disConnect();//disconect Database

   return 0;
}