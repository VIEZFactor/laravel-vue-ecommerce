<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white">

        
        
        <p class="text-left">

            <router-link to="/admin/users"  type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-blue-900 bg-transparent border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-900 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                All users
            </router-link>
        </p>

        <h1 class="text-3xl text-center mt-6">New user</h1>
        
        
        <form class="mt-4" method="POST" v-on:submit.prevent="saveUser()">
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="name"
                placeholder="User Name" name="name"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="email" v-model="email"
                placeholder="Email" name="email"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="password" v-model="password"
                placeholder="Password" name="password"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>

            <button type="submit" class="bg-green-500 w-full text-white py-3">Add user</button>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name: '',
                email: '',
                password: '',
            }
        },
        methods:{
            saveUser(){
                axios.post('/api/signup', { name:this.name, email:this.email, password:this.password, }, { headers: {Authorization: 'Bearer ' + localStorage.access_token } })
                .then(response => { 
                    console.log(response);
                    if(response.status == 201){
                        this.name = '';
                        this.email = '';
                        this.password = '';
                        this.$router.push('/admin/users');                        
                        this.$toasted.show('New user created successfully');
                    }
                })
                .catch(error => { console.log(error.response) });
            }
        }
    }
</script>
