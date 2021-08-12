#!/bin/bash
set -e -v


g++ -c odbc_insert_team.cpp
g++ -c odbc_insert_game.cpp
g++ -c odbc_insert_result.cpp
g++ -c odbc_show_game.cpp
g++ -c odbc_show_team.cpp
g++ -c odbc_view_team_results.cpp
g++ -c odbc_view_date_results.cpp
g++ -c odbc_db.cpp
g++ -Wall -I/usr/include/cppconn -o odbc_insert_team.exe odbc_insert_team.o odbc_db.o -L/usr/lib -lmysqlcppconn
g++ -Wall -I/usr/include/cppconn -o odbc_insert_game.exe odbc_insert_game.o odbc_db.o -L/usr/lib -lmysqlcppconn
g++ -Wall -I/usr/include/cppconn -o odbc_insert_result.exe odbc_insert_result.o odbc_db.o -L/usr/lib -lmysqlcppconn
g++ -Wall -I/usr/include/cppcon -o odbc_show_game.exe odbc_show_game.o odbc_db.o -L/usr/lib -lmysqlcppconn
g++ -Wall -I/usr/include/cppcon -o odbc_show_team.exe odbc_show_team.o odbc_db.o -L/usr/lib -lmysqlcppconn
g++ -Wall -I/usr/include/cppcon -o odbc_view_team_results.exe odbc_view_team_results.o odbc_db.o -L/usr/lib -lmysqlcppconn
g++ -Wall -I/usr/include/cppcon -o odbc_view_date_results.exe odbc_view_date_results.o odbc_db.o -L/usr/lib -lmysqlcppconn

