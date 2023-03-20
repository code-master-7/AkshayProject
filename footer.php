<footer class="bg-light text-center text-lg-start">

    <div class="text-center p-3" style="background-color: #009d63;">
        © 2023 Copyright: Devlopers(
        <a class="text-dark" href="https://www.linkedin.com/in/nimesh-kadecha-b42b771b9">Nimesh Kadecha</a> &
        <a class="text-dark" href="https://www.linkedin.com/in/vishwa-bhalodiya-99b581244">Vishwa Bhalodiya </a> &
        <a class="text-dark" href="https://www.linkedin.com/in/mohil-bhadja-97b026203">Mohil Bhadja </a>
        <?php
        $e = time() + 3600;
        if (!isset($_COOKIE['user'])) {
            setcookie('user', "user_Data", $e);
        }
        ?>
        )
    </div>
</footer>