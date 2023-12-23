<?php require 'views/partials/heading.php' ?>

<h1>Usernames</h1>
<?php foreach ($users as $user) : ?>
    <li><?= $user['name']; ?></li>
<?php endforeach; ?>

<h1>Submit Your Name</h1>
<form action="/names" method="POST">
    <input type="text" name="name" id="">
    <input type="submit" value="Submit">
</form>

<?php require 'views/partials/footer.php' ?>