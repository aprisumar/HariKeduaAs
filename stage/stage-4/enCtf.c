#include <stdio.h>
#include <string.h>
#include <assert.h>

int main(int argc, char *argv[]) {
	int i;
	char string[1000];
	if(argc == 2){
	strcat(string, argv[1]);
	for(i=0;string[i];i++){
		string[i]=string[i] +3;
		}
		printf("%s",string);
	}else{
	printf("input kosong!\nuse : %s string", argv[0]);
	}
    return 0;
}
