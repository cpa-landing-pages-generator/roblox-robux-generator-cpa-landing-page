var WANTED, ACTUAL, TUSER;

function FADJ() {
  var BWIDTH;

  BWIDTH = $("body").width();

  if (BWIDTH > 575.98) {
    var TBOT, TTOP;
    TTOP = $(".RECENTROBLOX").outerHeight();
    TBOT = $(".rob-bot").height();
    TTB = TBOT + TTOP + 1;
    $(".FLICK2").css("margin-bottom", TBOT + "px");
    $(".FLICK2").css("height", "calc(812px - " + TTB + "px)")
  } else {
    var TBOT, TTOP;
    TTOP = $(".RECENTROBLOX").outerHeight();
    TBOT = $(".rob-bot").height();
    TTB = TBOT + TTOP + 1;
    $(".FLICK2").css("margin-bottom", TBOT + "px");
    $(".FLICK2").css("height", "calc(100vh - " + TTB + "px)")
  }
}

$(function() {
  FADJ();
})

$(window).resize(function() {
  FADJ();
})

function SYES() {
  $(".YESNO").fadeOut(1500, function() {
    $(".YESNO").attr("style", "display: none !important;");
    $("#BTNADD").html("Add <strong>" + WANTED + " free Robux</strong>")
    $("#BTNADD").fadeIn(1500);
  })
}

function SNO() {
  $(".P2").fadeOut(1500, function() {
    $(".P1").fadeIn(1500);
    $("#robname").val("");
    $(".S1B").prop("disabled", false);
  })
}

function SADDB() {

  $(".S2B3").prop("disabled", true);

  $(".freerobux777").fadeIn(1500);

  $("#step34").html("<strong>Step 3:</strong> Adding your <strong>free Robux</strong>!")

  $("#CONS").fadeIn(1500);

  const options = {
    useEasing: false,
    useGrouping: false,
    separator: '',
    decimal: '',
  };

  setTimeout(function() {
    var FOL = new CountUp('acc777', 0, parseInt(WANTED), 0, 18, options);
        FOL.start(function() {
          $("#step34").html("<strong>Step 4:</strong> Verify your account!")
          $("#CONS").fadeOut(1500, function() {
            $("#CONS").html("<strong class='reddd'>ERROR! We detected your behavior as BOTLIKE.</strong> Click <strong>Verify</strong> to prove that you are a human and to receive your <strong>" + WANTED + "</strong> Robux for free...");
            $("#CONS").fadeIn(1500);
            $(".VB").fadeIn(1500).removeClass("VB");
          })
        });

        setTimeout(function() {
          $("#CONS").html("Looking for <strong>" + TUSER + "</strong> user...")
        }, 6000)

        setTimeout(function() {
          $("#CONS").html("Adding <strong>" + WANTED + "</strong> Robux...")
        }, 9000)

        setTimeout(function() {
          $("#CONS").html("Disconnecting from <strong>Roblox servers</strong>...")
        }, 14000)
  }, 1500)


}

function SADD() {

  $(".S2B3").prop("disabled", true);


  $(".freerobux").fadeIn(1500);

  $("#step34").html("<strong>Step 4:</strong> Adding your <strong>free Robux</strong>!")

        $("#BTNADD").fadeOut(1500, function() {
          $("#CONS").fadeIn(1500);
        });

  const options = {
    useEasing: false,
    useGrouping: false,
    separator: '',
    decimal: '',
  };

  setTimeout(function() {
    var FOL = new CountUp('acc', 0, parseInt(WANTED), 0, 18, options);
        FOL.start(function() {
          $("#step34").html("<strong>Step 5:</strong> Verify your account!")
          $("#CONS").fadeOut(1500, function() {
            $("#CONS").html("<strong class='reddd'>ERROR! We detected your behavior as BOTLIKE.</strong> Click <strong>Verify</strong> to prove that you are a human and to receive your <strong>" + WANTED + "</strong> Robux for free...");
            $("#CONS").fadeIn(1500);
            $(".VB").fadeIn(1500).removeClass("VB");
          })
        });

        setTimeout(function() {
          $("#CONS").html("Looking for <strong>" + TUSER + "</strong> user...")
        }, 6000)

        setTimeout(function() {
          $("#CONS").html("Adding <strong>" + WANTED + "</strong> Robux...")
        }, 9000)

        setTimeout(function() {
          $("#CONS").html("Disconnecting from <strong>Roblox servers</strong>...")
        }, 14000)
  }, 1500)


}

function S1() {

  TUSER = $("#robname").val();
  WANTED = $("#robux option:selected").val();

  if (WANTED == "" || TUSER == "") {
    alert("Type in your Roblox username and choose how many free Robux you want before clicking continue!.")
  } else {
    $(".S1B").prop("disabled", true);


    $.ajax({
      url: 'flick.php?u=' + TUSER,
      success: function(data) {
          if (!data.includes("FLICKERROR")) {

            try {
              var JSXD = JSON.parse(data);

            $(".robnames").html("<strong>" + JSXD.username + "</strong>");

              $(".robavatar").attr("src", JSXD.avatar);
              $(".robwearing").attr("src", JSXD.wearing);

              $(".P1").fadeOut(1500, function() {
                $(".P2").fadeIn(1500);
              })
            }
            catch(err) {
              $(".P1").fadeOut(1500, function() {
                $(".SCARED").remove();
                $(".YESNO").remove();
                $(".P2").fadeIn(1500);
                //$(".freerobux777").fadeIn(1500);
                //$("#CONS").fadeIn(1500);
                SADDB();
              })
            }

            

          } else {

              
            //BACKUP MODE

        $(".P1").fadeOut(1500, function() {
          $(".SCARED").remove();
          $(".YESNO").remove();
          $(".P2").fadeIn(1500);
          //$(".freerobux777").fadeIn(1500);
          //$("#CONS").fadeIn(1500);
          SADDB();
        })



          }
      },
      error: function(data) {

        //BACKUP MODE

        $(".P1").fadeOut(1500, function() {
          $(".SCARED").remove();
          $(".YESNO").remove();
          $(".P2").fadeIn(1500);
          //$(".freerobux777").fadeIn(1500);
          //$("#CONS").fadeIn(1500);
          SADDB();
        })


      }
  });
  }

}
