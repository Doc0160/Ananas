<div class="row">
        <div class="col l6 m12">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="http://materializecss.com/images/sample-1.jpg">
                    <span class="card-title"><?php echo  $data[0]['name']; ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo  $data[0]['description']; ?></p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>

        <div class="col l6 m12">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="<?php echo ROOTURL."/images/".$value["picture"]; ?>">
                    <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                       I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
</div>