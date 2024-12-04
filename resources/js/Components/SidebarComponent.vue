<script setup>
import {usePage} from "@inertiajs/vue3";
import SidebarNav from "@/Components/SidebarNav.vue";
const page = usePage()
// const role = page.props.auth.user.role
const logout = () => {
    console.log('logout')
}
</script>

<template>
    <div id="sidebar" class="sidebar">
        <Link :href="route('dashboard')" class="w-full flex justify-center pb-[26px] border-b border-dark border-opacity-[0.12]">
<!--            <img :src="theme === 'dark' ? '/img/brand/brand-logo-dark.svg' : '/img/brand/brand-logo-light.svg'" class="w-[75%]" alt="Brand Logo"/>-->
            Logo
        </Link>
        <div class="sidebar-menu">
            <SidebarNav :nav-route="route('dashboard')" nav-name="Dashboard" :active="{ 'active' : $page.url === '/dashboard'}">
                <i class="fa-solid fa-house"></i>
            </SidebarNav>
<!--            <sidebar-nav :nav-route="route('owner.service.index')" nav-name="Service" :active="{ 'active': $page.url.startsWith('/dashboard/owner/services') }">-->
<!--                <i class="fa-solid fa-house"></i>-->
<!--            </sidebar-nav>-->
<!--            <sidebar-nav-multiple nav-name="User" :child-items="[-->
<!--          { name: 'Staff', link: '/dashboard/staff' },-->
<!--          { name: 'Worker', link: '/dashboard/worker' },-->
<!--          { name: 'Customer', link: '/dashboard/customer' }-->
<!--          ]"></sidebar-nav-multiple>-->
            <button type="button" @click="logout" class="menu-link menu-link-hidden">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </button>
        </div>
    </div>
</template>

<style scoped>
</style>
