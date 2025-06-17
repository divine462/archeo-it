# generate_password.py

import random
import string
import sys

def generate(mode):
    length = 12
    if mode == "1":
        chars = string.ascii_letters
    elif mode == "2":
        chars = string.ascii_letters + string.digits
    elif mode == "3":
        chars = string.ascii_letters + string.digits + string.punctuation
    else:
        chars = string.ascii_letters
    return ''.join(random.choice(chars) for _ in range(length))

if __name__ == "__main__":
    if len(sys.argv) > 1:
        mode = sys.argv[1]
        print(generate(mode))
    else:
        print(generate("1"))
