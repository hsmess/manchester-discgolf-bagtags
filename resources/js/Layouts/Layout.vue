<template>
    <div>
        <nav class="bg-rose-400">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <inertia-link href="/">
                                <img :src="asset('assets/MDGLogoRainbow.png')" class="mdg w-16">
                            </inertia-link>

                        </div>
                        <!--                        <div class="hidden md:block">-->
                        <!--                            <div class="ml-10 flex items-baseline space-x-4">-->
                        <!--                                &lt;!&ndash; Current: "bg-rose-500 text-white", Default: "text-white hover:bg-rose-500 hover:bg-opacity-75" &ndash;&gt;-->
                        <!--                                <a href="#" class="bg-rose-500 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>-->

                        <!--                                <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 px-3 py-2 rounded-md text-sm font-medium">Team</a>-->

                        <!--                                <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 px-3 py-2 rounded-md text-sm font-medium">Projects</a>-->

                        <!--                                <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 px-3 py-2 rounded-md text-sm font-medium">Calendar</a>-->

                        <!--                                <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 px-3 py-2 rounded-md text-sm font-medium">Reports</a>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                    <div class="hidden md:block" v-if="user != null">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button class="p-1 bg-rose-400 rounded-full text-rose-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-rose-400 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="ml-3 relative">
                                <div>
                                    <button class="max-w-xs bg-rose-400 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-rose-400 focus:ring-white" id="user-menu" aria-haspopup="true"  @click="showMenu = !showMenu">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" :src="profilepicture" alt="">
                                    </button>
                                </div>


                                <transition
                                    enter-active-class="transition ease-out duration-100 transform"
                                    enter-class="opacity-0 scale-95"
                                    enter-to-class="opacity-100 scale-100"
                                    leave-active-class="transition ease-in duration-75 transform"
                                    leave-class="opacity-100 scale-100"
                                    leave-to-class="opacity-0 scale-95"
                                >
                                    <div v-show="showMenu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                        <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100" role="menuitem">Your Profile</a>

<!--                                        <a href="#" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100" role="menuitem">Settings</a>-->

                                        <form method="POST">
                                            <a href="#" @click="logout()" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100" role="menuitem">Sign Out</a>
                                        </form>

                                    </div>
                                </transition>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block" v-else>
                        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                            <inertia-link href="/login" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                                Sign in
                            </inertia-link>
                            <inertia-link href="/register" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-gray-500 bg-gray-600 hover:bg-gray-800">
                                Sign up
                            </inertia-link>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="bg-rose-400 inline-flex items-center justify-center p-2 rounded-md text-rose-200 hover:text-white hover:bg-rose-500 hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-rose-400 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" @click="showMenu = !showMenu">
                            <span class="sr-only">Open main menu</span>
                            <!--
                              Heroicon name: outline/menu

                              Menu open: "hidden", Menu closed: "block"
                            -->
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!--
                              Heroicon name: outline/x

                              Menu open: "block", Menu closed: "hidden"
                            -->
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <transition
                enter-active-class="transition ease-out duration-100 transform"
                enter-class="opacity-0 scale-95"
                enter-to-class="opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75 transform"
                leave-class="opacity-100 scale-100"
                leave-to-class="opacity-0 scale-95"
            >


                <div v-show="showMenu" class="md:hidden" id="mobile-menu">
                    <!--                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">-->
                    <!--                    &lt;!&ndash; Current: "bg-rose-500 text-white", Default: "text-white hover:bg-rose-500 hover:bg-opacity-75" &ndash;&gt;-->
                    <!--                    <a href="#" class="bg-rose-500 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>-->

                    <!--                    <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 block px-3 py-2 rounded-md text-base font-medium">Team</a>-->

                    <!--                    <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 block px-3 py-2 rounded-md text-base font-medium">Projects</a>-->

                    <!--                    <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 block px-3 py-2 rounded-md text-base font-medium">Calendar</a>-->

                    <!--                    <a href="#" class="text-white hover:bg-rose-500 hover:bg-opacity-75 block px-3 py-2 rounded-md text-base font-medium">Reports</a>-->
                    <!--                </div>-->
                    <div class="pt-4 pb-3 border-t border-rose-500">
                        <div class="flex items-center px-5" v-if="user != null">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" :src="profilepicture" alt="">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium text-white">{{ user.name }}</div>
                                <div class="text-sm font-medium text-gray-200">{{ user.email }}</div>
                            </div>
                            <button class="ml-auto bg-rose-400 flex-shrink-0 p-1 rounded-full text-rose-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-rose-400 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 px-2 space-y-1" v-if="user != null" >
                            <a href="/dashboard" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-rose-500 hover:bg-opacity-75">Your Profile</a>

<!--                            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-rose-500 hover:bg-opacity-75">Settings</a>-->

                            <a href="#" @click="logout()" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-rose-500 hover:bg-opacity-75">Sign out</a>
                        </div>
                        <div class="mt-6" v-if="user == null">
                            <inertia-link href="/register" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-gray-500 bg-gray-600 hover:bg-gray-700">
                                Sign up
                            </inertia-link>
                            <p class="mt-6 text-center text-base font-medium text-gray-500">
                                Existing customer?
                                <inertia-link href="/login" class="text-rose-600 hover:text-rose-500">
                                    Sign in
                                </inertia-link>
                            </p>
                        </div>
                    </div>
                </div>

            </transition>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <h1 class="text-lg leading-6 font-semibold text-gray-900">
                   Manchester Disc Golf Web App
                </h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <slot/>
                <!-- /End replace -->
            </div>
        </main>
    </div>

</template>

<style scoped>
.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-400 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-500 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
.bg-rose-400{
    background-color: lavender;
}
.bg-rose-200{
    background-color: lavender;
}
</style>

<script>
export default {
    name: "Layout",
    data() {
        return {
            showMenu: false,
        }
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    },
    computed:{
        user(){
            return this.$page.props.user;
        },
        profilepicture(){
            return this.$page.props.user.profile_picture != null ? this.$page.props.user.profile_picture : "https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2102&q=80";
        }
    }
}
</script>
