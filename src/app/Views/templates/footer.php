    </div>
</div>
<footer>
    <div class="copyrights">
        <p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
            open source licence.</p>
    </div>
</footer>
<!-- SCRIPTS -->
<script>
    function toggleMenu() {
        let menuItems = document.getElementsByClassName('menu-item');
        for (let i = 0; i < menuItems.length; i++) {
            let menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>
<!-- -->
</body>
</html>
