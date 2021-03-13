<template>
   <layout>
       <div class="px-4 py-4 sm:px-0">
           <div class="border-4 border-gray-200 rounded-lg bg-yellow-200 shadow ">
               <ul class="divide-y divide-gray-200">
                   <li v-for="tag in tags">
                       <inertia-link :href="'/tags/' + tag.tag_number" class="block hover:bg-gray-50">
                           <div class="px-4 py-4 sm:px-6">
                               <div class="flex items-center justify-between">
                                   <p class="text-sm font-medium text-indigo-600 truncate">
                                       Tag #{{tag.tag_number}}
                                   </p>
                                   <div class="ml-2 flex-shrink-0 flex">
                                       <button @click="launchEditModal(tag)" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300">
                                           Update
                                       </button>
                                   </div>
                               </div>
                               <div class="mt-2 sm:flex sm:justify-between">
                                   <div class="sm:flex">
                                       <p class="flex items-center text-sm text-gray-500">
                                           <!-- Heroicon name: solid/users -->
                                           <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                               <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                           </svg>
                                           {{tag.owner}}
                                       </p>
                                       <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                           <svg  class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                               <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                           </svg>
                                           Last defended: {{tag.lastActivity}}
                                       </p>
                                   </div>
                                   <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                       <!-- Heroicon name: solid/calendar -->
                                       <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                           <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                       </svg>
                                       <p v-if="tag.lastTransfer">
                                           First won:
                                           <time :datetime="tag.lastTransfer.ymd">{{tag.lastTransfer.human}}</time>
                                       </p>
                                   </div>
                               </div>
                           </div>
                       </inertia-link>
                   </li>
               </ul>
           </div>
       </div>
   </layout>

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
</style>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            tags: Array
        },
        name: "Home",
        data() {
            return {
                showMenu: false,
                tagBeingEdited: null
            }
        },
        // async mounted() {
        //
        //
        // },
        // computed: {
        //     // firstMethod() {
        //     //
        //     // }
        // },
        methods: {
            launchEditModal(tag)
            {
                this.tagBeingEdited = tag;
                //$this.modal.show etc
            }
        }
    }
</script>
