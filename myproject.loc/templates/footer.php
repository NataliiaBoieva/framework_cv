</td>

        <td width="300px" class="sidebar">
            <div class="sidebarHeader">Menu</div>
            <ul>
                <li><a href="/">Main page</a></li>
                <li><a href="/about-me">About myself</a></li>
               <?php if (!empty($user) && $user->isAdmin()): ?>  <li><a href="/articles/add">Розмістити статтю</a></li>
                <?php endif; ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td class="footer" colspan="2">All rights reserved (c) My blog</td>
    </tr>
</table>

</body>
</html>