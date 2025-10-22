<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
            padding: 20px;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
        }

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .price {
            font-weight: bold;
            color: #28a745;
        }
    </style>
    <title>Bootstrap demo</title>
</head>

<body>

    <div class="container-fluid">
        <h1>Catálogo de Productos</h1>

        <main>
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Error!</strong>
                    <?php echo $errorMessage ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (empty($products)): ?>
                <div class="alert alert-info">
                    <p>No hay productos disponibles en este momento.</p>
                </div>
            <?php else: ?>
                <div class="table-container">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Descripción</th>
                                <th class="text-end">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        <?php echo $product->getDescription() ?>
                                    </td>
                                    <td class="text-end">
                                        <span class="price">
                                            $<?php echo $product->getPrice(); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>



                </div>

                <div class="info mt-3">
                    <p class="text-muted">
                        Total de productos:
                        <strong class="text-dark"><?php echo $totalProducts; ?></strong>
                    </p>
                </div>
    </div>
<?php endif; ?>
</main>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>