
window.onload = function () {
    var arr = ['Home', 'New Requests', 'Pending Requsets', 'Account Settings', 'Logout'];
    var hrefArr =['index.php', 'new.php', '#', 'profilePage.php', 'login.php'];

    var s = document.createElement("section");
    s.className = "menuArea";
    document.body.appendChild(s);

    var a = document.createElement("a");
    a.className = "exitMenu";
    s.appendChild(a);
    a.href = "#";

    var ul = document.createElement("ul");
    ul.className = "menuContent";
    s.appendChild(ul);
    for (i = 0; i < arr.length; i++) {
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.innerHTML = arr[i];
        a.href = hrefArr[i];
        li.appendChild(a);
        ul.appendChild(li);
    }
    document.getElementsByClassName("menu")[0].onclick = function () {
        document.getElementsByClassName("menuArea")[0].style.top = "0px";
    }
    document.getElementsByClassName("exitMenu")[0].onclick = function () {
        document.getElementsByClassName("menuArea")[0].style.top = "-100%";
    }
}
function showPassword() {
    var x = document.getElementById("showPass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
function reLocate() {
  window.location.href = 'index.php';
}
function insertToMedicalPast() {
  $.getJSON("includes/json/medicalPast.json", function (data) {
    var userId = $('#sick2').data("id");
    console.log(userId);
      $.each(data.pateints, function () { {
            if((this.id == $('#sick2').data("id"))) {
                  $('.day').html(this.date[0].day);
                  $('.month').html(this.date[0].month);
                  $('.day2').html(this.date[1].day);
                  $('.month2').html(this.date[1].month);
                  $('.sick').html(this.sickness[0].diagnosis);
                  $('.drName').html(this.sickness[0].doctor);
                  $('#sick2').html(this.sickness[1].diagnosis);
                  $('.drName2').html(this.sickness[1].doctor);
            }
          }
      });
  });
}