

</div>
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Ananas</h5>
                <p class="grey-text text-lighten-4">
                    Fait avec  <svg class="heart" viewBox="0 0 32 29.6">
                    <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
                    </svg> par la team Ananas.
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Liens annexes</h5>
                <ul>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://moodle-exia.cesi.fr/course/view.php?id=631">Moodle</a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://github.com/Doc0160/Ananas">Github</a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="<?php echo ROOTURL.'/legal/' ?>">Mentions légales</a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="http://materializecss.com/">Materializecss</a>
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

     var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
         n = 0;
     $(document).keydown(function (e) {
         if (e.keyCode === k[n++]) {
             if (n === k.length) {
                 alert('Konami !!!'); // à remplacer par votre code
                 n = 0;
                 return false;
             }
         }
         else {
             n = 0;
         }
     });
     
     $('select').material_select();
     
     $('#carousel_1').carousel({fullWidth: true});
     setInterval(function(){
         $('#carousel_1').carousel('next');
     }, 3000);

     $('#carousel_2').carousel({
         dist:0,
         shift:100,
         padding:10,
     });
     setInterval(function(){
         $('#carousel_2').carousel('next');
     }, 3000);

     $(".button-collapse").each(function(id, el) {
         $(this).sideNav();
         console.log(el);
     });
     
     $('.datepicker').pickadate({
         selectMonths: true,
         selectYears: 15,
     });

     $('.collapsible').collapsible();

     setTimeout(function() {
         $('.ajax').each(function(id, el) {
             $(el).on('click', function(self) {
                 return function(e) {
                     if(self.prop('tagName') == 'FORM') {
                         self.submit(function(e){
		                     $.ajax({type:"POST",
                                     data: $(this).serialize(),
                                     url: $(this).attr('action'),
                                     type: $(this).attr('method'),
			                         success: function(data){
                                         console.log('f');
			                         }
		                     });
                             e.preventDefault();
	                     });
                         
                     } else if(self.prop('tagName') == 'A') {
                         e.preventDefault();
                         $.ajax(self.attr('href')).success(function(self) {
                             if(self.hasClass('like')) {
                                 return function() {
                                     var i = self.find('i');
                                     var span = self.find('span');
                                     self.removeClass('like');
                                     self.addClass('dislike');
                                     i.text('thumb_down');
                                     span.text(parseInt(span.text())+1);
                                 };
                             } else if(self.hasClass('dislike')) {
                                 return function() {
                                     var i = self.find('i');
                                     var span = self.find('span');
                                     self.removeClass('dislike');
                                     self.addClass('like');
                                     i.text('thumb_up');
                                     span.text(parseInt(span.text())-1);
                                 };
                             } else {
                                 return function() {
                                     console.log('done');
                                 };
                             }
                             
                         }(self));
                     }
                 };
             }($(el)));
         });
     });
 }, 0); 

</script>
    </body>
</html>
