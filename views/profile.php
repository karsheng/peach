<table class="table table-striped" id="recommendationsTable">
        <thead>
            <tr>
                <th>Recommendations</th>
                <th>Consultants</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cons as $con): ?>
        
            <tr>
                <td><?="<img class = 'img-circle' src = consultant_photos/".$con['name']."_1.jpeg >"?></td>
                <td><?= $con['name']?></td>
                <td><button value = "<?= $con['id']?>" class="btn btn-warning btn-view" data-toggle="modal" data-target="#recModal">View</button></td>
            </tr>
        
        <?php endforeach ?>

        
        </tbody>
</table>
	<!-- Modal -->
	<div class="modal fade" id="recModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide carousel-sync" data-ride="carousel" data-interval="false">
      <!-- Indicators -->
      <ol class="carousel-indicators" id="carousel-indicators-custom">
      </ol>
      <div class="carousel-inner" id="carousel-body-custom" role="listbox">


      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

	      </div>
	      <div class="modal-footer">
	          <a role='button'><span class='glyphicon glyphicon-heart' value='0'></span></a>
	      </div>
	    </div>
	  </div>
	</div>
