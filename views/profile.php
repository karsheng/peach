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
	  
	</div>
