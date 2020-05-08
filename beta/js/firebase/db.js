// var instance = require('./firebase.js')
import * as data from "./firebase.js";
var db = new data.DataBase();
db._init_()
var x = db.getFirebaseInstance();
var database = firebase.database();

export{
    database
}
// db.destroy();


// var database = firebase.database();
// var db = new DataBase();
// db.get
