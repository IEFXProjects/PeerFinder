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

#moves form data to easier to use vars
username=form["username"].strip()#[0]
password=form["password"].strip()#[1]
email=form["email"].strip()#[2]
firstName=form["firstName"].strip()#[3]
lastName=form["lastName"].strip()#[5]
middleName=form["middleName"].strip()#[4]
college=form["college"].strip()#[6]
major=form["major"].strip()#[7]
minor=form["minor"].strip()#[8]

#easier to check if these dont happen (check if there is an error rather than if they work
#first check if the user name is taken
for i in users:
    if i[0] == username:#assumes the firs element of sublist to be username
        print "username taken"
#then check if the passwords match
    elif password != form["passwordConfirmed"]:
        print "passwords do not match"
#then check if the email is a Illinois email
    elif email[-13:]!='@illinois.edu':
        print "email is not a U of I email"
#then check if the emails match
    elif email!=form["emailConfirmed"]:
        print emails do not match
#then if all is ok write the info to users.csv (or a similar file)
    else:
        userdata=username+','+password+','+email+','+firstName+','+middleName+','
        userdata+=lastName+','+college+','+major+','+minor
        f1+=userdata+'\n'
        f0=open('users.csv','w')
        f0.write(f1)
        f0.close()

