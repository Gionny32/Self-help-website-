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

   <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script> 

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    $('.slider').slick({
      infinite: true,
      slideToShow: 1,
      slideToScroll: 1
    });      
  </script>
</body>
</html>