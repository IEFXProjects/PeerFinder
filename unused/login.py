#!/usr/bin/python
import cgi, cgitb
import datetime
import os
import sys
#from datetime import *
cgitb.enable()

page='Content-type: text/html\n\n'
form=cgi.FieldStorage()


#open a pathway to the users data file
f0=open('Users.csv','r')
#read the data from the file into a variable
f1=f1.read()
#close the file pathway to prevent corruption
f0.close()
#split the string of user data by line (into users)
users=f1.split('\n')#this is now a list of string where each string is the user data
#split the strings into sub lists
numUsers=len(users)#temp var to hold number of users
newUsers=[None]*numUsers #temp var to create new users list which will be sub lists
x=0 #declares var for use in next line
#following loop takes the string of user data in each slot of users and creates a sub list from it
while x<numUsers:
    newUsers[x]=users[x].split(',')
    x+=1
users=newUsers #replaces list of strings with list of sublists, the ideal form for data manipulation.

inputUsername=form["username"].strip()
inputPassword=["password"].strip()

#looks in sublist x of List (a list of sublists) for value
def checkForUser(x,List,value):
    for item in List:
        if item[x]==value:
            return True
        else:
            return False
            
if '@' in inputUsername:
    login=checkForUser(2,users,inputUsername)
else:
    login=checkForUser(0,users,inputUsername)

if login:
	import subprocess
	proc = subprocess.Popen("usercookie.php", shell = True, stdout = subprocess.PIPE)
	script_response = proc.stdout.read()
	#if the login is correct it will link to the php file which plants the cookie on their computer preserving login status.
    #login the user. IDK how yet.
else:
    #read in the template file and print out the error page.
    f0=open('loginError.html','r')
    f1=f0.read()
    f0.close()
    page+=f1
    print page
    
    
