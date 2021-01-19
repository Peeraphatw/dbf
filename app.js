const { DBFFile } = require('dbffile');
var output = [];
async function readFileDBF() {
  let dbf = await DBFFile.open('DBF/ARMAS.DBF', { encoding: 'ISO-8859-11' });

  console.log(`DBF file contains ${dbf.recordCount} records.`);
  console.log(`Field names: ${dbf.fields.map((f) => f.name).join(', ')}`);
  let records = await dbf.readRecords(2);

  for (let record of records) {
    console.log(record);
  }
}

readFileDBF();
console.log(output);
