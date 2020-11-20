// import * as firebase from "firebase/app";
// import "firebase/database";


export class DataBase {
DataBase(key,domain,project_id,databaseURL,storage_bucket,messaging_sender,app_id,measurement_id){
  console.log("test")
  this.key = key;
  this.authDomain = domain;
  this.databaseURL = databaseURL;
  this.project_id = project_id;
  this.storage_bucket = storage_bucket; 
  this.messaging_sender = messaging_sender;
  this.app_id = app_id;
 this.measurement_id = measurement_id;

}

_init_(){
   this.firebaseConfig = {
    apiKey: "AIzaSyBB8EVN1e95UFiz7_CLxSCygWPwWaMDang",
    authDomain: "artbid-d3199.firebaseapp.com",
    databaseURL: "https://artbid-d3199.firebaseio.com",
    projectId: "artbid-d3199",
    storageBucket: "artbid-d3199.appspot.com",
    messagingSenderId: "255159898856",
    appId: "1:255159898856:web:3f38ec796ee4587427af5d",
    measurementId: "G-NLYVBLNPLW"


    //  apiKey: this.key,
    // authDomain: this.authDomain,
    // databaseURL: this.databaseURL,
    // projectId: this.project_id,
    // storageBucket: this.storage_bucket,
    // messagingSenderId: this.messaging_sender,
    // appId:this.app_id,
    // measurementId: this.measurement_id
  };
}
  // Initialize Firebase
  // firebase.analytics();
getFirebaseInstance(){
  return this.firebase = firebase.initializeApp(this.firebaseConfig)
}
destroy(){
  alert('done')
  this.firebase.delete();
}
  


}


