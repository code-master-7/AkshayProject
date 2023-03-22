<footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3" style="background-color: #FF6600;">
        © All rights reserved. Developed by <a class="text-dark" href="http://www.aclic.in">Aclic</a>
        <?php
        $e = time() + 3600;
        if (!isset($_COOKIE['user'])) {
            setcookie('user', "user_Data", $e);
        }
        ?>
    </div>
</footer>