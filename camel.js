let z = ['HALLO', 'TELKOMSEL', 'INDI HOME', 'MY REPUBLIC', 'YOII']
let zz = [];
z.map((z) => {
    let u = z.split(' ')
    let ret = [];
    u.map((d) => {
        d = d.toLowerCase().charAt(0).toUpperCase() + d.slice(1).toLowerCase();
        ret.push(d);
    });
    zz.push(ret.join(' '));
});
console.log(zz);
