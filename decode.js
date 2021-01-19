const fs = require('fs');
const iconv = require('iconv-lite');
const input = fs.readFileSync('DBF/ARMAS.DBF', { encoding: 'binary' });
// ISO-8859-11
const output = iconv.decode(input, 'ISO-8859-11');
console.log(output);
