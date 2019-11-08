import numpy as np
import argparse
import cv2 as cv
import subprocess
import time
import os
from yolo_utils import infer_image, show_image
import pandas as pd
from flask import Flask, render_template, Response,request
from yolo import detectionofkiranastore
import webdetect
app = Flask(__name__)
FLAGS = []
@app.route('/')
def index(): #index page
	print('index page loaded')
	import cleartempdb
	cleartempdb.truncatealldb()
	return render_template('index.html')

@app.route('/video_feed') #take video feed from cam to browser
def video_feed():
    """Video streaming route. Put this in the src attribute of an img tag."""
    return Response(webdetect.gen(),mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/webdetection')
def webdetection(): #main page where detection of object is done
	print('webdetection page open')
	return render_template('webdetection.html')


@app.route('/add_to_cart')# function to add item to cart for billing
def add_to_cart():
	import yolo
	classids,boxes=yolo.detectionofkiranastore() #return detected class and area of contures
	print('item detected add to cart')
	import add_to_cart
	add_to_cart.cartdb(classids,boxes) #item added to bill 
	print('added to cart')
	return '0'

@app.route('/remove_from_cart')# function to add item to cart for billing
def remove_from_cart():
	import yolo
	classids,boxes=yolo.detectionofkiranastore()#return detected class and area of contures
	print('item detected remove from cart')
	import remove_from_cart
	remove_from_cart.cartdb(classids,boxes)  #item removed from bill 
	print('item removed')
	return '0'

@app.route("/checkbill") #fuction to check bill output
def checkbill():
	import checkbill
	checkbill.createbilldb()
	print('bill.html created')
	#send to cloudfn from databasefn
	import cleartempdb
	cleartempdb.truncatetempbilldb()#truncate  temperory bill from tabel
	return render_template('checkbill.html')

@app.route("/checkout")
def checkout():
	import printing
	print("printing in progress")
	printing.printbill() #to print bill recipt at the exit
	return render_template('thankyou.html')#thanku page

@app.route('/sendebill',methods = ['POST', 'GET'])#function to get bill on email
def sendebill():
	if request.method == 'POST':
		cname = request.form['Name']
		cemail = request.form['Email']
		print(cname,cemail)
		import checkbill
		print('ebill created')
		ebill=checkbill.ebilldff() #get bill detail
		import mailing
		mailing.sendmailbill(cemail,ebill)#send bill
		print('ebill sent')
		import cleartempdb
		cleartempdb.truncatealldb()
		return render_template("index.html")# return to index page


@app.route('/skip',methods=['GET', 'POST']) #if ebill option not selected skip to index page
def skip():
	print('skiped to index')
	import cleartempdb #clear all temp database tabels
	cleartempdb.truncatealldb()
	return render_template("index.html")

if __name__ == '__main__':
	app.jinja_env.auto_reload = True
	app.config['TEMPLATES_AUTO_RELOAD'] =True
	app.run(host='0.0.0.0',threaded=True) #server ip 
