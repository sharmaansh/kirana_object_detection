def truncatetempbilldb(): #clear temp bill tabel
    import mysql.connector
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="Root1110129",
    database="kiranadb"
)
    mycursor = mydb.cursor()
    mycursor.execute("TRUNCATE TABLE billdb")
    #print('truncated')


def truncatealldb(): #clear cart and bill tabel
    import mysql.connector
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="Root1110129",
    database="kiranadb"
)
    mycursor = mydb.cursor()
    mycursor.execute("TRUNCATE TABLE billdb")
    mycursor.execute("TRUNCATE TABLE cartdb")
    #print('truncated')

