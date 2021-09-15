var mysql = require('mysql');

var conn = mysql.createConnection({
  host: "localhost",
  user: "admin",
  password: "Admin_12345.",
  database: "mesterminal"
});

var products=[];

conn.connect(function(err) {
  if (err) throw err;
  conn.query("SELECT * FROM `product`", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});


let output;
  
const setOutput = (rows) => {
    output = rows;
    console.log(output);
}
  
db_con.connect(async(err) => {
    if (err) {
        console.log("Database Connection Failed !!!", err);
        return;
    }
  
    console.log("Connected to Database");
  
    let query = 'SELECT name FROM product';
    db_con.query(query, (err, rows) => {
        if (err) {
            console.log("internal error", err);
            return;
        }
          
        // This is the important function
        setOutput(rows);
    });
});

$( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );