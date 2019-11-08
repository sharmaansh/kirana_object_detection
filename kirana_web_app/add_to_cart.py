def cartdb(classids,boxes): #conn to temp cart tabel
    import yolo
    import mysql.connector
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="Root1110129",
    database="kiranadb"
)
    for i in range(len(classids)):
        area=boxes[i][2]*boxes[i][3]
        itemid=0
        itemid=classids[i]
        #print("class:"+str(classids[i]))
        #print("area:"+str(area))
        if(area<25000 and classids[i]==3):
            itemid=itemid+1000
        if(area<4000 and classids[i]==4):
            itemid=itemid+1000
        mycursor = mydb.cursor()
        sql = "INSERT INTO cartdb (itemid,size) VALUES (%s, %s)"
        val = (int(itemid), int(area))
        mycursor.execute(sql, val)
        mydb.commit()
    #print(mycursor.rowcount, "record inserted.")