#include <iostream>
#include <stdio.h>
#include <string.h>


int main(int argc, char ** argv) {

    std::string nmsinfo = "10";
    char str[1000];
    char nameFile[1000] = "trace_data_";
    const char* nmsinfoChr = nmsinfo.c_str();
    strcat(nameFile, nmsinfoChr);
    strcat(nameFile, ".dat");
    std::cout << nameFile;
    return 0;

}
