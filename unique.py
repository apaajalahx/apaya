import random

# cara mempersulit hidup

def unique():

    def _ran(from_num: int = 0, to_num: int = 10, choices: str = 'str') -> str or int:
        if choices == 'str':
            return "".join([ random.choices('abcdefghijklmnopqrstuvwxyz')[0] for i in range(from_num, to_num)])
        elif choices == 'int':
            return int("".join([ random.choices('0123456789')[0] for i in range(from_num, to_num)]))

    let_3: str = _ran(0, 3, choices='str')
    dig_3: int = _ran(0, 3, choices='int') * 2
    let_4: str = _ran(0, 4, choices='str')
    return f"LV{str(let_3)}{str(dig_3)}{str(let_4)}"

z = unique()
print(z)
