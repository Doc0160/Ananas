

</div>
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">
                    Fait avec  <i class="material-icons">code</i> par la team Ananas.
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://moodle-exia.cesi.fr/course/view.php?id=631">Moodle</a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://github.com/Doc0160/Ananas">Github</a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="#!">Link 3</a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="#!">Link 4</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
			© 2017 Ananas Corp.
            <a class="grey-text text-lighten-4 right" href="https://moodle-exia.cesi.fr/course/view.php?id=631">Project Web</a>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?php echo ROOTURL; ?>/materialize/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo ROOTURL; ?>/materialize/js/materialize.min.js"></script>
<script>
 $(document).ready(function(){
     $('.carousel').carousel({fullWidth: true});
     setTimeout(function(){
        $('.carousel').carousel('next');
     }, 250);
     $(".button-collapse").sideNav();
 });
</script>
    </body>
</html>
