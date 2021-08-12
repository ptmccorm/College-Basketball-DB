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
 
   // Print GAME Table for user to select Game ID to insert a result into RESULT Table
   string builder = "";
   string query1 = "SELECT * from GAME;";
   builder.append("<br> Select Game ID from the following list of games:" + myDB.query(query1) +"<br>");
   cout << builder;
       
   myDB.disConnect();//disconect Database

   return 0;
}