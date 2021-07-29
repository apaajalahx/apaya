    function getKey(object, value, value2){
        for(let i=0;i<=(object.length-1);i++){
            if(object.hasOwnProperty(i)){
                if(object[i]['BLOCK_NAME'] === value && object[i]['BLOCK_CODE'] === value2){
                    return i;
                }
            }
        }
    }
    const data = [{ a:'1',b:'1' },{a: '2',b:'2'}];
    console.log(getKey(data, '1', '1')) // return 0 coz 0 is key for { a:'1',b:'1' }
