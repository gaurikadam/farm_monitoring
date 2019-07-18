#import string
import serial
#import numpy
import mysql.connector

# Open database connection
db = mysql.connector.connect(
    host = '127.0.0.1',
    user = 'root',
    passwd = 'ash98',
    db='iotdb'
        )


cursor = db.cursor()


tempC = [0]
count = 0

arduinoData = serial.Serial('COM8', 9600)  

while True:
    #arduinoData.write('N')
    while(arduinoData.inWaiting() == 0):
        pass
    data = arduinoData.readline()
    dataArray = data.split(',')
    print (dataArray[0])
    print (dataArray[1])
    print (dataArray[2])
    print (dataArray[3])
    print (dataArray[4])

    #print dataArray[2]
	
    motoroff = float( dataArray[0])
    motoron = float( dataArray[1])
    rain = float( dataArray[2])
    temp = float( dataArray[3])
    mos = float( dataArray[4])
	


    # Prepare SQL query to INSERT a record into the database.
    sql = "INSERT INTO iottable(MOTORON,MOTOROFF,RAIN,TEMP,MOS) \
       VALUES ('%d','%d','%d','%d','%d' )" % \
       (motoroff,motoron,rain,temp,mos)
    try:
       # Execute the SQL command
       cursor.execute(sql)
       # Commit your changes in the database
       db.commit()
    except:
       # Rollback in case there is any error
       db.rollback()
    tempC.append(temp)
    count = count + 1
    if(count >= 30):
        tempC.pop(0)
