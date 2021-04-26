#!/usr/bin/python3

def is_prime(a):
	for i in range(2, a):
		if not(a % i):
			return False
	return True

for i in range(1,100):
	if is_prime(i):
		print(i)
