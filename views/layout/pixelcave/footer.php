    	
        <?php if ($_layoutParams['item'] != 'login'): ?>
            	
	               </div><!-- Cierre col-->
                </div><!-- Cierre row-->
            </div><!-- Cierre container-->

            
            <br><br>
            <footer class="footer">
              <div class="container">
                <p class="text-muted">Copyright &copy; 2016 <a href="http://www.atinarte.com" target="_blank"><?php echo APP_COMPANY; ?></a></p>
              </div>
            </footer>
            </div><!-- Cierre patron--></div>
        <?php else: ?>  
          </div><!-- Cierre patron--></div>

        <?php endif ?>
        
        

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.2.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo $_layoutParams['ruta_js']; ?>vendor/bootstrap.min.js"></script>
        <script src="<?php echo $_layoutParams['ruta_js']; ?>plugins.js"></script>
        <script src="<?php echo $_layoutParams['ruta_js']; ?>app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo $_layoutParams['ruta_js']; ?>pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>

        
    </body>
</html>