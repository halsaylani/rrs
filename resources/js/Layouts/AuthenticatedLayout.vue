<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="flex flex-row min-h-screen bg-black text-gray-800">
        <aside
            class="sidebar w-64 md:shadow transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in bg-black">
            <div class="sidebar-header flex items-center justify-center py-4">
                <div class="inline-flex">
                    <a href="#" class="inline-flex flex-row items-center">
                        <div>
                            <Link href="/dashboard">
                            <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                            </Link>
                        </div>
                    </a>
                </div>
            </div>
            <div class="sidebar-content px-4 py-6">
                <ul class="flex flex-col w-full">
                    <li class="my-px">
                        <a href="/dashboard"
                            class="flex flex-row items-center h-10 px-3 rounded-lg text-white hover:bg-gray-900"
                            :active="route().current('/dashboard')">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <li class="my-px">
                        <a :href="route('request.index')"
                            class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-900 ">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </span>
                            <span class="ml-3">Requests</span>
                        </a>
                    </li>

                    <li class="my-px">
                        <a :href="route('tables.index')"
                            class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-900 ">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </span>
                            <span class="ml-3">Tables</span>
                        </a>
                    </li>
                    <li class="my-px">
                        <a href="#"
                            class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-900 ">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            <span class="ml-3">Users</span>
                            <span
                                class="flex items-center justify-center text-xs text-red-500 font-semibold bg-red-100 h-6 px-2 rounded-full ml-auto">1k</span>
                        </a>
                    </li>

                    <li class="my-px">
                        <a :href="route('qr.index')"
                            class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-900 ">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </span>
                            <span class="ml-3">Qr Code</span>
                        </a>
                    </li>

                    <li class="my-px">
                        <span class="flex font-medium text-sm text-gray-300 px-4 my-4 uppercase">Account</span>
                    </li>
                    <li class="my-px">
                        <a href="#"
                            class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-900 ">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="ml-3">Profile</span>
                        </a>
                    </li>


                    <li class="my-px">
                        <a class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-900 ">
                            <span class="flex items-center justify-center text-lg text-red-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path
                                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <Link class="ml-3" :href="route('logout')" method="post" as="button" type="button">Logout
                            </Link>

                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main flex flex-col flex-grow -ml-64 md:ml-0 transition-all duration-150 ease-in">
            <header class="header bg-black shadow py-4 px-4">
                <div class="header-content flex items-center flex-row">
                    <form action="#">
                        <div class="hidden md:flex relative">
                        </div>
                        <div class="flex md:hidden">
                            <a href="#" class="flex items-center justify-center h-10 w-10 border-transparent">
                                <svg class="h-6 w-6 text-gray-500" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </a>
                        </div>
                    </form>
                    <div class="flex ml-auto">
                        <a href class="flex flex-row items-center">
                            <div class="h-10 w-10 bg-orange-500 rounded-full" />
                            <span class="flex flex-col ml-2 text-white">
                                <span class="truncate w-20 font-semibold tracking-wide leading-none"> {{
                                        $page.props.auth.user.name
                                }}</span>
                                <span class="truncate w-20 text-xs leading-none mt-1"> {{ $page.props.auth.user.email
                                }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            </header>
            <div class="main-content flex flex-col flex-grow p-4 bg-black">
                <slot />
            </div>
            <footer class="footer bg-gray-900 rounded-t-lg px-4 py-6">
                <div class="footer-content">
                    <p class="text-sm text-white text-center">?? halsaylani.com 2023. All rights reserved. <a
                            href="https://halsaylani.com/">by halsaylani.com</a></p>
                </div>
            </footer>
        </main>
    </div>
</template>
