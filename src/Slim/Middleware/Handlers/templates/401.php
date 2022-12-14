<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unauthorized</title>
    <style><?php include("styles.css"); ?></style>
</head>
<body>
    <h1>Unauthorized</h1>
    <p>You are not authorized to view this page.</p>

    <?php
    use SpaethTech\Slim\Middleware\Authentication\Authenticators\Authenticator;
    use Slim\Routing\Route;

    /**
     * @var bool            $debug
     * @var string          $vRoute
     * @var array           $vQuery
     * @var Authenticator   $authenticator
     * @var Route           $route
     */
    if (isset($data))
        list(
            $debug,
            $vRoute,
            $vQuery,
            $authenticator,
            $route
        ) = array_values($data);
    ?>

    <?php if ($debug) { ?>

        <h4>Virtual Route:</h4>
        <ul>
            <li><?php echo $vRoute; ?></li>
        </ul>

        <?php if ($vQuery) { ?>
            <h4>Virtual Query Parameters:</h4>
            <ul>
                <?php foreach ($vQuery as $key => $value) { ?>
                    <li><?php echo $key; ?> = <?php echo $value; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <?php if ($route) { ?>
            <h4>Matched Route:</h4>
            <ul>
                <li>
                    <span><?php echo $route->getPattern(); ?></span>
                    <?php foreach ($route->getMethods() as $method) { ?>
                        <span class="badge"><?php echo $method; ?></span>
                    <?php } ?>
                </li>
            </ul>
        <?php } ?>

        <?php if ($authenticator) { ?>
            <h4>Using Authenticator:</h4>
            <ul>
                <li><?php echo $authenticator; ?></li>
            </ul>
        <?php } ?>

    <?php } ?>

    <a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>">Home</a>
</body>
</html>
