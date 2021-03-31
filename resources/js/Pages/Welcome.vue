<template>
   <layout>
       <!-- This example requires Tailwind CSS v2.0+ -->
       <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="tagBeingEdited">
           <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
               <!--
                 Background overlay, show/hide based on modal state.

                 Entering: "ease-out duration-300"
                   From: "opacity-0"
                   To: "opacity-100"
                 Leaving: "ease-in duration-200"
                   From: "opacity-100"
                   To: "opacity-0"
               -->
               <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

               <!-- This element is to trick the browser into centering the modal contents. -->
               <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

               <!--
                 Modal panel, show/hide based on modal state.

                 Entering: "ease-out duration-300"
                   From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                   To: "opacity-100 translate-y-0 sm:scale-100"
                 Leaving: "ease-in duration-200"
                   From: "opacity-100 translate-y-0 sm:scale-100"
                   To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
               -->
               <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                   <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                       <div class="sm:flex sm:items-start">
                           <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                               <!-- Heroicon name: outline/exclamation -->
                               <svg class="h-6 w-6 text-yellow-400"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                           </svg>
                           </div>
                           <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                               <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                   Update Tag Owner
                               </h3>
                               <div class="mt-2" v-if="tagBeingEdited">
                                   <p class="text-sm text-gray-500">
                                       Select who just won tag number {{tagBeingEdited.tag_number}} from {{tagBeingEdited.owner}}...
                                   </p>
                                   <div class="flex-1 truncate">
                                       <div class="mt-1">
                                           <select v-model="new_user" id="location" name="location" class="mt-1 block w-100 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm rounded-md">
                                               <option :value="null" :selected="true">-</option>
                                               <option v-for="user in parsed_users" :value="user.id">{{user.name}}</option>
                                           </select>
                                       </div>
                                       <p class="mt-2 text-sm text-gray-500" id="new-owner-description">This user's current tag will become empty.</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                       <button type="button" @click="processUpdateTag()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                           Update Tag
                       </button>
                       <button type="button" @click="tagBeingEdited = null;" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                           Cancel
                       </button>
                   </div>
               </div>
           </div>
       </div>
       <div class="px-4 py-4 sm:px-0">
           <div class="border-4 border-gray-200 rounded-lg bg-gray-50 shadow ">
               <ul class="divide-y divide-gray-200">
                   <li v-for="tag in parsed_tags">
                       <div class="block hover:bg-yellow-200">
                           <div class="px-4 py-4 sm:px-6">
                               <div class="flex items-center justify-between">
                                   <p class="text-sm font-medium text-yellow-600 truncate">
                                       Tag #{{tag.tag_number}}
                                   </p>
                                   <div class="ml-2 flex-shrink-0 flex">
                                       <button @click="launchEditModal(tag, $event)" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300">
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
                                           Last Transfer:
                                           <time v-if="tag.lastTransfer.ymd != null" :datetime="tag.lastTransfer.ymd">{{tag.lastTransfer.human}}</time>
                                           <span v-else>Never</span>
                                       </p>
                                   </div>
                               </div>
                           </div>
                       </div>
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
            tags: Object,
            users: Object
        },
        name: "Home",
        data() {
            return {
                showMenu: false,
                tagBeingEdited: null,
                new_user: null,
                parsed_users: [],
                parsed_tags: []
            }
        },
        mounted() {
            this.parsed_users = this.users.data;
            this.parsed_tags = this.tags.data;

        },
        // computed: {
        //     // firstMethod() {
        //     //
        //     // }
        // },
        methods: {
            launchEditModal(tag, e)
            {
                e.preventDefault();
                this.tagBeingEdited = tag;
                //$this.modal.show etc
            },
            processUpdateTag(){
                let self = this;
                axios.post('/api/tag/' + self.tagBeingEdited.id + '/update', {
                    'new_user_id': self.new_user
                }).then(function (response) {
                    console.log(response);
                    self.parsed_users = response.data.users;
                    self.parsed_tags = response.data.tags;
                    self.tagBeingEdited = null;
                });
            }
        }
    }
</script>
