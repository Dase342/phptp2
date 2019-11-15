<?php
$urlToRestApi = $this->Url->build('/api/countries', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Countries/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default countries-content">
            <div class="panel-heading">Countries <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Country</h2>
                <form class="form" id="countryAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="countryAction('add')">Add Country</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Cocktail" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Country</h2>
                <form class="form" id="countryEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="nameEdit"/>
                    </div>
                   
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="countryAction('edit')">Update Country</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Cocktail" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                    
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="countryData">
                    <?php
                    $count = 0;
                    foreach ($countries as $country): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $country['name']; ?></td>
             
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCountry('<?php echo $country['id']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? countryAction('delete', '<?php echo $country['id']; ?>') : false;"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    <tr><td colspan="5">No country(ies) found......</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

