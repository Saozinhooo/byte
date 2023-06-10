<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sb-1.4.2/datatables.min.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><?php echo session()->fname . " " . session()->fname;  ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container mt-3">
        <h1>History</h1>
        <table id="bookingHistory" class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Package Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Activities</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($packageData)) : ?>
                    <?php foreach ($packageData as $package) : ?>
                        <?php if (isset($package[0])) : ?>
                            <tr>
                                <td><?= $package[0]['title'] ?></td>
                                <td>P<?= $package[0]['price'] ?></td>
                                <td><?= $package[0]['activity'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <footer class="mt-3">
        <div class="container">

        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/sca/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sb-1.4.2/datatables.min.js"></script>



    <script>
        $(document).ready(function() {
            var table = $('#bookingHistory').DataTable();
        });
    </script>










</body>

</html>