<h3><?= $data['title'] ?></h3>
<table>
    <thead>
        <th>Id</th>
        <th>Naam</th>
        <th>Age</th>
        <th>Company</th>
        <th>Nettoworth</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<p><a href="<?= URLROOT; ?> /controllers/Homepages">back to landingpage</a></p>