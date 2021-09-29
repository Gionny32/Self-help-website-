
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

  <link rel="stylesheet" href="style1.css">
  <title>Categories</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark ">
    <div class="container">
      <a href="Contact.php" class="navbar-brand ">INSIDE MATTERS</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>



    <!-- PAGE HEADER -->
 <header id="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center"><br>
          <h1><i class="fas fa-edit" style="color:#27aael;">Food and Mood Journal</i></h1>
          <p>    </p>
        </div>
      </div>
    </div>
  </header>
    <!-- HEADER END-->

    <div id="myDIV" class="header">
      <h2 style="margin:5px">My Journal List</h2>
      <input type="text" id="myInput" placeholder="Title...">
      <span onclick="newElement()" class="addBtn">Add</span>
    </div>

    <ul id="myUL">
      <li>Hit the gym</li>
      <li class="checked">What to eat</li>
      <li>Meet George</li>
      <li>Buy eggs</li>
      <li>Read a book</li>
      <li>Organize office</li>
    </ul>

    <script>
    // Create a "close" button and append it to each list item
    var myNodelist = document.getElementsByTagName("LI");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
      var span = document.createElement("SPAN");
      var txt = document.createTextNode("\u00D7");
      span.className = "close";
      span.appendChild(txt);
      myNodelist[i].appendChild(span);
    }

    // Click on a close button to hide the current list item
    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
      close[i].onclick = function() {
        var div = this.parentElement;
        div.style.display = "none";
      }
    }

    // Add a "checked" symbol when clicking on a list item
    var list = document.querySelector('ul');
    list.addEventListener('click', function(ev) {
      if (ev.target.tagName === 'LI') {
        ev.target.classList.toggle('checked');
      }
    }, false);

    // Create a new list item when clicking on the "Add" button
    function newElement() {
      var li = document.createElement("li");
      var inputValue = document.getElementById("myInput").value;
      var t = document.createTextNode(inputValue);
      li.appendChild(t);
      if (inputValue === '') {
        alert("You must write something!");
      } else {
        document.getElementById("myUL").appendChild(li);
      }
      document.getElementById("myInput").value = "";

      var span = document.createElement("SPAN");
      var txt = document.createTextNode("\u00D7");
      span.className = "close";
      span.appendChild(txt);
      li.appendChild(span);

      for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
          var div = this.parentElement;
          div.style.display = "none";
        }
      }
    }
    </script>








  <!-- FOOTER -->
  <footer id="main-footer" class="text-center p-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>Copyright &copy;
            <span id="year"></span> Inside Matters</p>
        </div>
      </div>
    </div>
  </footer>

<!-- FOOTER END -->
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

  </script>
</body>

</html>
