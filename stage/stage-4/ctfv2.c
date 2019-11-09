#include <stdio.h>
#include <string.h>
#include <assert.h>

int check_password(char *pass) {
    int stage2 = 0; 

    /* stage 1, check the first 5 letters */ 
    if (pass[0] == 'N') {
        if (pass[1] == '4') {
            if (pass[2] == '5') {
                if (pass[3] == 'H') {
                    if (pass[4] == 'T') {
                        stage2 = 1; 
                    }
                }
            }
        }
    }

    /* stage 2, check the next 5 letters */ 
    if (stage2) {
            if (pass[5] == '_') {
                if (pass[6] == 'f') {
                    if (pass[7] == 'l') {
                        if (pass[8] == '3') {
                            if (pass[9] == 'g') {
                            	if (pass[10] == '_') {
                            	if (pass[11] == '1') {
                                return 0; 
                                }
                                }
                            }
                        }
                    }
                }
            }
    } else {
        return -1;
    }
}

int check_pass_len(char *pass) {
    int i = 0; 
    while(pass[i] != '\0') {
        i++;
    }
    return i; 
}


int main(int argc, char *argv[]) {
    char pass[12];
    int i,stage2 = 0; 
	char flag[20] = "iodjbdefgh"; // <--CHANGE_SOURCE
	char *fleg = "ijklmnopqr"; // <--GANTI2
    
	printf("source made bY Johny a.k.a PETR03X\nthank to all or other member N45HT\nBasic Guide:\n1. Cari atau jump password dengan cara reverse enginering atau cara lain nya!\n2. selamat mencoba :'v\n3. GoodLuck ! \n");
    printf("Enter password: "); 
    scanf("%s", pass);
    printf("You try ENTER => [%s]\n", pass); 

 
    if ((check_pass_len(pass) == 12) && 
        (check_password(pass) == 0)) {
        strcat(flag,fleg);
        for(i=0;flag[i];i++){
        	flag[i]=flag[i]-3;
        }
        printf("You Won flag is!\n");
        printf("=> [%s] <=\n", flag);
        printf("masukan flag yang kalian dapatkan pada form yang sudah di sediakan pada website awal!\n");
    } else {
        printf("Opps.. password salah ! :p\n"); 
    }
    return 0;
}
