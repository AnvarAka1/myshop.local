$(document).ready(function() {
  $(".addCart").click(function(event) {
    event.preventDefault();
    const id = this.id.match(/[0-9]+/g);
    addToCart(id);
  });
  $(".removeCart").click(function(event) {
    event.preventDefault();
    const id = this.id.match(/[0-9]+/g);
    console.log(id);
    removeFromCart(id);
  });

  $(".itemCnt").keyup(function(event) {
    const value = event.target.value;
    const id = this.id.match(/[0-9]+/g);
    calculateTotalPrice(id, value);
  });
  $("#regInput").click(function() {
    registerNewUser();
  });
  function addToCart(itemId) {
    console.log("js - addToCart");
    $.ajax({
      type: "POST",
      async: true,
      url: "/cart/addtocart/" + itemId + "/",
      dataType: "json",

      success: function(data) {
        console.log("hey!");
        if (data["success"]) {
          $("#cartCntItems").html(data["cntItems"]);
          $("#addCart_" + itemId).hide();
          $("#removeCart_" + itemId).show();
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + " " + thrownError);
      }
    });
  }
});

function removeFromCart(itemId) {
  $.ajax({
    type: "POST",
    async: true,
    url: "/cart/removefromcart/" + itemId + "/",
    dataType: "json",
    success: function(data) {
      if (data["success"]) {
        $("#cartCntItems").html(data["cntItems"]);
        $("#removeCart_" + itemId).hide();
        $("#addCart_" + itemId).show();
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(xhr.status + " " + thrownError);
    }
  });
}
function calculateTotalPrice(id, value) {
  const price = parseInt($("#itemPrice_" + id).attr("value"));
  const totalPrice = price * value;
  $("#itemRealPrice_" + id).html(totalPrice);
}

function getData(objForm) {
  let hData = {};
  $("input, textarea, select", objForm).each(function() {
    if (this.name && this.name != "") {
      hData[this.name] = this.value;
      console.log("hData[" + this.name + "] = " + hData[this.name]);
    }
  });
  return hData;
}

function registerNewUser() {
  const postData = getData("#registerBox");

  $.ajax({
    type: "POST",
    async: true,
    url: "/user/register/",
    data: postData,
    dataType: "json",
    success: function(data) {
      if (data["success"]) {
        alert(data["message"]);
        $("#registerBox").hide();
      } else {
        alert(data["message"]);
      }
    }
  });
}
