#!/usr/bin/python3
# param dir = Directory Path
# param extension = array of extension you want get
# 
def list_file(dir,extension):
    get_files = os.listdir(dir)
    files = [i for i in get_files if i.split('.').pop() in extension]
    for i in files:
        print(i)

list_file('/home/users/',['jpg','png','gif'])
