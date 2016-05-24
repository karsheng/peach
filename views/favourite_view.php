<table class="table table-striped" id="recommendationsTable">
        <thead>
            <tr>
                <th></th>
                <th>Price</th>
                <th>Consultant</th>
                <th>Comments</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($favourites as $favourite): ?>
        
            <tr>
                <td><?="<img class = 'img-circle' src = dresses/".$favourite['img_name'].">"?></td>
                <td><?= $favourite['price']?></td>
                <td><?= $favourite['con_name']?></td>
                <td><?= mb_strimwidth($favourite['comments'],0,30,'...')?></td>
                <td>
                <a role='button'><span id='user-fav' name='<?= $favourite['rec_id']?>' class='user-fav glyphicon glyphicon-heart user-favourited' value='1'></span></a>    
                <?php if ($favourite['cart'] == 1 ): ?>
	            <a role='button'><span class='user-cart glyphicon glyphicon-shopping-cart user-added-cart' name='<?= $favourite['rec_id']?>'  value='0'></span></a>
                <?php else: ?>
                <a role='button'><span class='user-cart glyphicon glyphicon-shopping-cart user-not-added-cart' name='<?= $favourite['rec_id']?>' value='0'></span></a>
                <?php endif ?>
                </td>
                <td></td>
            </tr>

            <script type="text/javascript">
            var favourite = <?php echo json_encode($favourite['rec_id']); ?>;
            </script>            
        
        <?php endforeach ?>

        
        </tbody>
</table>

