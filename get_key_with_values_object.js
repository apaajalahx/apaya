let data = { RR: 1.50, RR25: 2.19, ZX25: 0.07, CBR15: 0.09, CBR25:0.81, R15:0.27, R25:0.07};

// sorting Object data from small to big by value
const x = Object.entries(data)
    .sort(([,a],[,b]) => a-b)
    .reduce((r, [k, v]) => ({ ...r, [k]: v }), {});
let real_val;
// get value of first key after sorting
for(let key in x){
    real_val = x[key];
    break;
}
// get key with same value
function getkeySameValue(obj, value){
            return Object.keys(obj).filter(key => obj[key] === value);
}
