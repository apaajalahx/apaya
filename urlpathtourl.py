#!/python
from urllib.parse import urlparse
from sys import argv

 
# convert https://google.com/awdw/awodaw/aw to https://google.com 

def save(z):
    a = open('domain.txt', 'a')
    a.write(z + "\n")
    a.close()

def main(url):
    s = urlparse(url)
    save("{}://{}".format(s.scheme, s.netloc))

if __name__ == '__main__':
    if len(argv) > 1:
        z = open(argv[1], 'r').read()
        for u in z.splitlines():
            main(u)
    else:
        print("usage python {} list.txt".format(argv[0]))
