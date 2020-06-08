<?php include_once './partials/script.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><?php echo $myCompany->getProps()['name'] ?></h1>
            <p>Fiscal code: <?php echo $myCompany->getProps()['fiscalCode'] ?></p>
            <p>Address: <?php echo $myCompany->getProps()['address'] ?></p>
            <p>Phone number: <?php echo $myCompany->getProps()['phoneNumber'] ?></p>
        </div>
    </header>

    <main>
        <section class="col-8 offset-2">
            <h2>Employees</h2>
            <p>The following employees has been added</p>

            <table class="table">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th score="col">Gender</th>
                </tr>

                <?php foreach($myCompany->getProps()['hrStock'] as $item) { ?>
                    <tr>
                        <td><?php echo $item->getProps()['id'] ?></td>
                        <td><?php echo $item->getProps()['surname'] ?></td>
                        <td><?php echo $item->getProps()['name'] ?></td>
                        <td><?php echo $item->getProps()['role'] ?> </td>
                        <td><?php echo $item->getProps()['gender'] ?> </td>
                    </tr>
                <?php } ?>
            </table>

            <h2>Errors</h2>
            <p>During the loading of the employees' data, the followings errors occured:</p>
            <ul>
                <?php foreach($myCompany->getProps()['errors'] as $error) { ?>
                    <li> <?php echo $error ?></li>
                <?php } ?>
            </ul>
        </section>
    </main>

</body>
</html> 
