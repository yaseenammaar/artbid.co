var database = firebase.database();

    var imageid = localStorage.getItem("imageid");
    var furl = localStorage.getItem("furl");

    var imgurls = [];
    var currentprice = 0;
    var lastbidder;
    var lastamount;
    var doneonce = 0;
    var category, deliverstate, state;

    function getitems()
    {
        var dbref = database.ref('items').child(imageid);
        dbref.on("value", function(child){
          $('#title').html(child.val().title);
          $('#price').html("<b>₹ " + child.val().b_price + "</b>");
          $('#description').html(child.val().caption);
          $('#closingdate').html(child.val().closing_time + " "+ child.val().closing_date);


          category = child.val().category;
          deliverstate = child.val().availablestate;
          state = child.val().state;


          currentprice = child.val().b_price;
          if(doneonce==1){
              location.reload();
          }
          doneonce = 1;


          child.forEach(function(snapshot){

          })
          imgurls = child.val().imgurl;


          localStorage.setItem("imgurls",imgurls);

          database.ref('user').child(child.val().byUser).on("value", function(snap){
                $('#byuser').html("By " + snap.val().username);
            })
          });
        var count = 0;

        var dbref = database.ref('items').child(imageid).child('bidders');
          dbref.on('value', function(snapshot) {
            count=0;
            snapshot.forEach(function(child){
              lastbidder = child.val().userid;
              lastamount = child.val().amount;
              currentprice = lastamount;
              console.log('Bidders : ' + lastbidder)
              console.log('Amount : ' + lastamount)
              console.log('Count : ' + count)
              count++;
              if(snapshot.numChildren()==count)
              {
                database.ref('user').child(lastbidder).on("value", function(snap){
                console.log('OL : Bidders : ' + lastbidder);
                console.log('OL : Amount : ' + lastamount); 
                currentprice = lastamount;
                console.log('OL : Current bid : ' + currentprice); 
                var nextminbid =  parseFloat(currentprice) + parseFloat(currentprice *.01);
                // nextminbid -= 1;
                nextminbid = Math.ceil(nextminbid)
                $('#price').html("₹ " + lastamount + " by "+snap.val().username+"");

                // if($('#price').val().includes("by")){
                  $('#nextbidtext').html("<b>Next min bid ₹ " + nextminbid + "</b>");
                // }
                console.log('OL : username : ' + snap.val().username)

                })
              }

            })
            
            
              // take the last item with the lowest key in the snapshot
          });
        // dbref.on("value", function(child){
        //   child.forEach(function(snapshot){
        //     bidders.push(snapshot.val());
        //   })
        // });
        
    }

    getitems();


    function showmore(){
      Swal.fire(
              '',
              '<h5>Category : '+category+'<br><br><br>State : ' + state +'<br><br><br>Available for delivery in state : ' + deliverstate + '</h5>',
              'info',
            )
    }

  function navtopreview(){
    if(screen.width>800)
    {
      goto('preview.html');
    }else{
      goto('mpreview.html');
    }
  }

  function bid(){
    var bidamount = $('#bidamount').val();
    var nextbidamount = parseInt(currentprice) + parseFloat(currentprice*.01);

    firebase.auth().onAuthStateChanged((user) => {
      if (user) {
        if(user.uid==lastbidder)
        {
          Swal.fire(
              'You are dominating',
              'You cannot bid again',
              'info',
            )
        }else{
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#5bc51f',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Bid!'
          }).then((result) => {
            if (result.value) {
              nextbidamount = Math.ceil(nextbidamount)
              if(bidamount<=nextbidamount)
                {
                  Swal.fire(
                    'Too Less',
                    'Next bid must be more than ' + (nextbidamount),
                    'error',
                  )
                }else{
                  let timerInterval
                  Swal.fire({
                    title: 'Processing..',
                    timer: 80,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                      Swal.showLoading()
                      
                    },
                    onClose: () => {
                      clearInterval(timerInterval)
                    }

                  }).then((result) => {
                    /* Read more about handling dismissals below */
                    Swal.fire(
                    'Woo Hoo.. Bidded',
                    'You are now dominating',
                    'success',
                  )
                  })

                  setTimeout(function(){ 
                    biddata(user.uid);
                  }, 1000);


                }
            }
          })
          
        }
      } else {
        Swal.fire(
            'You must login before placing bid',
            '',
            'info',
          )
        setTimeout(function(){ 
          goto('login.html')
        }, 2000);

      }
    });  
    
  }

  function biddata(uid){

    var newKey = firebase.database().ref('/').push().key;
    var currentdate = new Date(); 
    var dbrefer = firebase.database();
    var keys = [];
    // dbrefer.ref('user/'+uid+'/biddeditems').on("value", function(child){        
    //   child.forEach(function(snapshot){
    //     keys.push(snapshot.val().newkey);

    //   });
    // var available = (keys.indexOf(imageid) > -1);
    // if(available==-1)
    // {
    //   dbrefer.ref('user/'+uid+'/biddeditems/' + newKey ).set({
    //     "newkey":imageid
    //   })
    // }
    // });

    dbrefer.ref('user/'+uid+'/biddeditems').push().set(imageid)

    
    dbrefer.ref('items/'+imageid+'/bidders/' + newKey).set({
      "newkey":imageid,
      "userid":uid,
      "amount":$('#bidamount').val(),
      "datetime":Date()
    })
    location.reload();
  }


  function checkauth(){

    //check authentication then

    // window.location.href = 'login.html';
    window.location.href = 'profile.html';

  }


  function showupcomingdialog(){
      Swal.fire(
        'Upcoming!!!',
        'Told You',
        'info',
      )
  }
  function goto(link){
    var delayInMilliseconds = 500; //1 second


    setTimeout(function() {
      window.location.href = link;
    }, delayInMilliseconds);

    
  }

  function getSaved(uid){
      var saved = [];
      var count = 0;
      var found = 0;
      var foundatkey = "";
      var database = firebase.database();
      var key = database.ref('/').push().key;

      var dbref = database.ref('saveditems').child(uid);
      // dbref.set
      // ({
      //   key:imageid;
      // });
      dbref.once("value", function(child){
        if(!child.exists()){
             
          }else{
            child.forEach(function(snapshot){
                count++;
                if(snapshot.val()==imageid){
                  found = 1;
                  foundatkey = snapshot.key;
                }
                if(child.numChildren()==count){
                  if(found==1){
                    $("#save-btn").html("Saved");
                  }else{
                    $("#save-btn").html("Save");
                  }
                }
            }
            );
          }
      });
    }

    function checklogin(){
      firebase.auth().onAuthStateChanged((user) => {
            if (user) {
              getSaved(user.uid);
            }
          }
          );
    }




  
    function save(){
      var saved = [];
      var count = 0;
      var found = 0;
      var foundatkey = "";
      var database = firebase.database();
      var key = database.ref('/').push().key;
      firebase.auth().onAuthStateChanged((user) => {
            if (user) {
              var dbref = database.ref('saveditems').child(user.uid);
              dbref.once("value", function(child){
                if(!child.exists()){
                      dbref.child(key).set(imageid)
                      Swal.fire('Added to save','','success')
                  }else{
                    child.forEach(function(snapshot){
                      
                        saved.push(snapshot.val())
                        count++;
                        if(snapshot.val()==imageid){
                          found = 1;
                          foundatkey = snapshot.key;
                        }


                        if(child.numChildren()==count){
                          if(found==1){
                            $("#save-btn").html("Save");

                            dbref.child(foundatkey).remove();
                            Swal.fire('Removed from save','','info')
                          }else{
                            dbref.child(key).set(imageid)
                            $("#save-btn").html("Saved");
                              Swal.fire('Added to save','','success')
                          }
                        }
                      
                    }
                    );
                  }
              });
            }else{
               Swal.fire(
                'Login to save',
                '',
                'info',
              )
            }
          }
        )      
    }



  


  function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    document.getElementById("livesearch").innerHTML=str;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
  }


  $(document).ready(function() {
  var ripple_wrap = $('.ripple-wrap'),
      rippler = $('.ripple'),
      finish = false,
      monitor = function(el) {
        var computed = window.getComputedStyle(el, null),
            borderwidth = parseFloat(computed.getPropertyValue('border-left-width'));
        if (!finish && borderwidth >= 1500) {
          el.style.WebkitAnimationPlayState = "paused";
          el.style.animationPlayState = "paused";
          swapContent();
        }
        if (finish) {
          el.style.WebkitAnimationPlayState = "running";
          el.style.animationPlayState = "running";
          return;
        } else {
          window.requestAnimationFrame(function() {monitor(el)});
        }
      };
  
  storedcontent = $('#content-2').html();
  $('#content-2').remove();
  
  rippler.bind("webkitAnimationEnd oAnimationEnd msAnimationEnd mozAnimationEnd animationend", function(e){
    ripple_wrap.removeClass('goripple');
  });

  $('body').on('click', 'li', function(e) {
    rippler.css('left', e.clientX + 'px');
    rippler.css('top', e.clientY + 'px');
    e.preventDefault();
    finish = false;
    ripple_wrap.addClass('goripple');
    window.requestAnimationFrame(function() {monitor(rippler[0])});
  });
  function swapContent() {
      var newcontent = $('#content-area').html();
      $('#content-area').html(storedcontent);
      storedcontent = newcontent;
      // do some Ajax, put it in the DOM and then set this to true
      setTimeout(function() {
        finish = true;
      },10);
  }
  
});