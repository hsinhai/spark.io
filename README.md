spark.io
========

Some simple scripts for testing my spark core

digitalwrite.php - a quick .php script to control the core from a web page/server. So hope it is useful to someone else.

Your core should be running tinker when you receive it, so no need to change anything. You just need to connect the core to the web.

You will need to know and change two variables:
a) ***$my_access_token*** ; this is your access token (find this in the build tool under SETTINGS) 
b) ***$my_device*** ; your cores device id (find this in the build tool under CORES)

This is a basic form that can control the little blue led on/off, just ftp it to your web server. Really consists of 3 parts:

1) a form to set the bit state
2) building the url from variables
3) the cURL function

