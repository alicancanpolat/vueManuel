<template>
    <nav >
        <ul class="flex  space-x-6">
            <li><NavLink href="/" :active="$page.component ==='home'">Home</NavLink></li>
            <li><NavLink href="/users" :active="$page.component ==='users'">Users</NavLink></li>
            <li><NavLink href="/settings" :active="$page.component ==='settings'">Settings</NavLink></li>
            <li><NavLink href="/logout" method="post">Log Out</NavLink></li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "./NavLink.vue";
export default {
    components: { NavLink }
}
</script>
