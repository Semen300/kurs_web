function form_res_querry(nickname, key_arr, ansv_arr){
    let res_arr = [0,0,0,0,0];
    let itog = 0;
    let total = 0;
    for(let i=0;i<ansv_arr.length;i++){
        if(ansv_arr[i]==key_arr[i][0]){
            res_arr[i]=key_arr[i][1];
            total+=key_arr[i][2];
        }
    }
    let sql = "UPDATE results SET res_1="+res_arr[0]+", res_2="+res_arr[1]+", res_3="+res_arr[2]+", res_4="+res_arr[3]+", res_5="+res_arr[4]+" WHERE nickname='"+nickname+"'";
    return sql;
}

