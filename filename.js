const fs = require("fs");
var path = require("path");
const folder = "DBF/";

fs.readdir(folder, (err, files) => {
  files.forEach((file) => {
    if (path.extname(file) === ".DBF")
      console.log(file.replace(/\.[^/.]+$/, ""));
  });
});
