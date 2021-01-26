const { DBFFile } = require("dbffile");
const express = require("express");
const app = express();
const cors = require("cors");
var output;
app.use(express.json());
app.use(cors());
app.get("/", (req, res) => {
  const readFileDBF = async () => {
    let dbf = await DBFFile.open("DBF/ARMAS.DBF", { encoding: "ISO-8859-11" });

    //console.log(`DBF file contains ${dbf.recordCount} records.`);
    //console.log(`Field names: ${dbf.fields.map((f) => f.name).join(", ")}`);
    let records = await dbf.readRecords(dbf.recordCount);
    //console.log(records);
    return records;
  };
  readFileDBF().then((data) => res.status(200).json({ data: data }));
});

app.listen(3000, () => {
  console.log("server is running on port 3000");
});
