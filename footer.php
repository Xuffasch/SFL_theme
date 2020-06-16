  <!-- END OF THEME -->
    <?php wp_footer(); ?>
    <!-- script for the menu button in mobile display -->
    </div> <!-- End of z-position -->
    <script>
      function toggleMenu() {
        // let button = document.getElementById('menu-button');
        this.classList.toggle("change");

        let menu = document.getElementsByClassName('menu-container');
        menu[0].classList.toggle("menu-toggle-on");
      }

      var menu_button = document.getElementById('menu-button');
      menu_button.onclick = toggleMenu;
    </script>
  </body>
</html>