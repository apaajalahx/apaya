#include <iostream>

#define KEOK 32

/*

    change value with multiple function

*/


void test2(uint8_t *q) {

    std::cout << q[0] << " FUNCTION TEST 2 CALL 1" << '\n' << std::endl;
    q[0] = 0x33;
    std::cout << q[0] << " FUNCTION TEST 2 CALL 2" << '\n' << std::endl;
}

void test(uint8_t *q) {
    std::cout << q[0] << " FUNCTION TEST 1 CALL 1" << '\n' << std::endl;
    q[0] = 0x71;
    std::cout << q[0] << " FUNCTION TEST 1 CALL 2" << '\n' << std::endl;
    test2(q);
}

int main() {

    uint8_t TxBuff[KEOK];

    TxBuff[0] = 0x77;
    std::cout << TxBuff[0] << " FIRST CHECK" << '\n' << std::endl;
    test(TxBuff);
    std::cout << TxBuff[0] << " END CHECK" << '\n' << std::endl;
}
