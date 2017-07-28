<h1>Submit your name</h1>
<hr>
<form action="/users" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name">
    <button type="submit">Submit</button>
</form>

<?php foreach($users as $user):?>
<li><?=$user['name'];?></li>
<?php endforeach;?>
