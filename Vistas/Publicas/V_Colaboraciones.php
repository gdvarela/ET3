<?php

Class Colaboraciones
{

function __construct()
{
}

function DisplayContent($idioma)
{
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
		<div class="container content">		
        <!-- Service Blcoks -->
		<div class="row">
	
	<div class="col-md-12">
			<article class="item column-1"> 
<!--  title/author -->
<header class="item_header">
	<h3>Our Best Services</h3></header>
<!-- Introtext -->
<div>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimusLorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus</p>

<ul class="item_list">
	<li><a href="#">Consultancy Services</a></li>
	<li><a href="#">Business Plan Progress</a></li>
	<li><a href="#">Best Marketing Business Plans</a></li>
	<li><a href="#">International Expansion Plans</a></li>
	<li><a href="#">Franchise Assessment Team</a></li>
	<li><a href="#">National Opportunities Investment Growth</a></li>
</ul></div>
<!-- info BOTTOM -->
			</article><!-- end item -->
					</div>
					</div>
					
        <div class="row service-v1 margin-bottom-40">
            <div class="col-md-4 md-margin-bottom-40">
               <img class="img-responsive" src="<?php echo $RutaRelativaControlador?>img/service1.jpg" alt="">   
                <h3>Web Development</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus</p>        
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="<?php echo $RutaRelativaControlador?>img/service2.jpg" alt="">            
                <h3>Mobile Development</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus</p>        
            </div>
            <div class="col-md-4 md-margin-bottom-40">
              <img class="img-responsive" src="<?php echo $RutaRelativaControlador?>img/service3.jpg" alt="">  
                <h3>Responsive Design</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus</p>        
            </div>
        </div>
        <!-- End Service Blcoks -->

        <hr class="margin-bottom-50">

        <!-- Info Blcoks -->
        <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-bell-o"></i>
                <div class="info-blocks-in">
                    <h3>Awesome Design</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-hdd-o"></i>
                <div class="info-blocks-in">
                    <h3>FontAwesome</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-lightbulb-o"></i>
                <div class="info-blocks-in">
                    <h3>Bootstrap</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
        </div>
        <!-- End Info Blcoks -->

       
        <!-- Info Blcoks -->
        <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-code"></i>
                <div class="info-blocks-in">
                    <h3>SEO Ready</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-compress"></i>
                <div class="info-blocks-in">
                    <h3>Fully Responsive</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-html5"></i>
                <div class="info-blocks-in">
                    <h3>CSS3 + HTML5</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
        </div>
        <!-- End Info Blcoks -->

        
    </div>
    </section>
	<?php

}

}

?>