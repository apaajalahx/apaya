from termcolor import colored
import random
from time import sleep

z = ( ['K','k'] , ['O','o'], ['N','n'],['T','t'],['O','o'],['L','l'])
o = 0
warna = ['cyan','red','blue','white','green','yellow']
try:
    while True:
        y = ''
        for i in range(0,len(z)):
            p = random.choice(warna)
            u = 0 if o == i else 1
            y += f"{colored(z[i][u],p)}"
        print(f"{y}", end="\r")
        sleep(0.1)
        o = o + 1
        if o == 6:
            o = 0
except KeyboardInterrupt:
    print('end', end="\r")
