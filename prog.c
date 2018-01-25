#include <stdio.h>

int main(){
int a = 1, b;
b = (a++, a + 2); printf("%d\n", b);
return 0;
}
