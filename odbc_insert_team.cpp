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
   string query1 = "SELECT * from TEAM;";
   builder.append("<br> TEAM table before:" + myDB.query(query1) +"<br>");
 
   // Parse input string to get Team University Name and Nickname and Rank
   string ID = "7";
   string university_name = "UNIVERSITY_NAME";
   string nickname = "NICKNAME";
   string rank = "RANK";

   // Read command line arguments
   // First arg, arg[0] is the name of the program
   // Next args are the parameters
   university_name = argv[1];
   nickname = argv[2];
   rank = argv[3];
   
   int newID = stoi(ID);
   newID++;
   ID = to_string(newID);
    
   // Insert the new team
   string input = "'" + university_name + "','" + nickname + "','" + rank + "'";               
   myDB.insert("TEAM", input);    // insert new college sports team
 
   //For debugging purposes: Show the database after insert
   builder.append("<br> Table TEAM after:" + myDB.query(query1));
   cout << builder; 
       
   myDB.disConnect();//disconect Database

   return 0;
}


