#include <iostream>

#define KEOK 32

/*

    change value with multiple function
    struct also

*/

struct AnimalName
{
    std::string Dog = "Rizky";
    int Total = 1; 
};

void testStruct2(AnimalName &a) {
    std::cout << "Test 2 \n" << std::endl;
    std::cout << "Name : " << a.Dog << "\nType : Dog" << "Total : " << a.Total << std::endl;
    a.Dog = "Dabo";
    a.Total = 3;
    std::cout << "Name : " << a.Dog << "\nType : Dog" << "Total : " << a.Total << std::endl;
    std::cout << "Test 2 END \n" << std::endl;
}

void testStruct(AnimalName &a) {
    std::cout << "Test 1 \n" << std::endl;
    std::cout << "Name : " << a.Dog << "\nType : Dog" << "Total : " << a.Total << std::endl;
    a.Dog = "Amril";
    a.Total = 2;
    std::cout << "Name : " << a.Dog << "\nType : Dog" << "Total : " << a.Total << std::endl;
    std::cout << "Test 1 END \n" << std::endl;
    testStruct2(a);
}

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
    AnimalName animal;
    std::cout << "Name : " << animal.Dog << "\nType : Dog" << "Total : " << animal.Total << std::endl;
    testStruct(animal);
    std::cout << "Name : " << animal.Dog << "\nType : Dog" << "Total : " << animal.Total << std::endl;
}
