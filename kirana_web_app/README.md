#########################READ readme.pdf for more info############################################

        #edge server side implimentaion
    
        app.py
        {
            #this is the main script to run webapp to server

            websetection.py
            {
                #main page for client to detect object and check bill

                add_to_cart.py
                {
                    #add item detected to cart
                }

                remove_from_cart.py
                {
                    #remove item from cart
                }

                checkbill.py
                {
                    #to check bill of the items added to cart and see dynamically genrated bill
                }
            }

            checkout.py
            {
                #to checkout from billing and get printed or ebill

                printing.py
                {
                    #to print bill
                }

                mailling.py
                {
                    #to mail e bill
                }
            }
            yolo.py
            {
                #returns class of detected item and area
            }
            yolo_utils.py
            {
                #some fuction used by yolo are defined here
            }
        }
    }


templates--html files
static--css js img files
