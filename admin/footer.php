<?php
/**
 * Footer File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
?>
<!-- Footer -->
<footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" 
              class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" 
                class="nav-link" target="_blank">
                  Creative Tim
                </a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" 
                class="nav-link" target="_blank">
                  About Us
                </a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" 
                class="nav-link" target="_blank">
                  Blog
                </a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/
                argon-dashboard/blob/master/LICENSE.md" 
                class="nav-link" target="_blank">
                  MIT License
                </a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js">
  </script>
  <script src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="custom.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script>
  $(document).ready( function () {
    $('#table_id').DataTable();
    function errors(id) {
      var input = document.getElementById(id);
      var inputValue = input.value;
      if (input.id == "mon_price") {
        if (input.value.length > input.maxLength) 
        input.value = input.value.slice(0, input.maxLength);
      }
      if (inputValue == '') {
          input.classList.add('div-error');
          var error = id+"Error";
          document.getElementById(error).innerHTML = 
          '<div class="form-error-message"><i class="fa fa-exclamation-circle"></i> This field is required.</div>';
          document.getElementById("submit").setAttribute("disabled", "true");
      }
      else {
          var error = id+"Error";
          document.getElementById(error).innerHTML= '';
          input.classList.remove('div-error');
          document.getElementById("submit").removeAttribute("disabled");
      }
    } 
    $('#sub_cat').blur(function(){
        var sub_cat = document.getElementById('sub_cat').value;
        var val = /^[a-zA-Z ]*$/g;
        var val1 = /\b[a-zA-z]+[0-9a-zA-Z\.\ ]+[a-zA-z0-9]+$\b|^[a-zA-z][0-9a-zA-Z\ ]+$/g;
        if (val.test(sub_cat) || val1.test(sub_cat)) {
          sub_cat = sub_cat.replace(/  +/g, ' ');
          sub_cat = sub_cat.trim();
          document.getElementById('sub_cat').value = sub_cat;
        } else {
          document.getElementById('sub_cat').value = "";
        }
    });
} );
</script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
</body>

</html>