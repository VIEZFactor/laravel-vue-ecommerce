<template>
    <div class="w-full sm:w-8/12 md:w-8/12 p-5 bg-white mt-20">
        
        <h1 class="text-3xl text-center mb-4">Products List</h1>

        <p class="text-center">
            <router-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" to="/admin/products/create" >New Product</router-link>
        </p>

        <table class="table-auto w-full mt-6">
            <thead>
                <tr class="bg-blue-200">
                    <th class="border border-blue-600 py-2 px-2">Name</th>
                    <th class="border border-blue-600 py-2 px-2">Slug</th>
                    <th class="border border-blue-600 py-2 px-2">Price</th>
                    <th class="border border-blue-600 py-2 px-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td class="border border-blue-600 py-2 px-2 text-center">{{ product.name }}</td>
                    <td class="border border-blue-600 py-2 px-2 text-center">{{ product.slug }}</td>
                    <td class="border border-blue-600 py-2 px-2 text-center">{{ product.price }}</td>
                    <td class="border border-blue-600 text-center py-2 px-2">
                        <div class="inline-flex rounded-md shadow-sm" role="group">                            
                            <router-link :to="'/admin/products/edit/'+product.id" type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-blue-500 bg-transparent rounded-l-lg border border-blue-500 hover:bg-blue-500 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-500 focus:bg-blue-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Edit
                            </router-link>
                            <form v-on:submit.prevent="deleteProduct(product.id)">
                            <button type="submit" class="inline-flex items-center py-2 px-4 text-sm font-medium text-red-500 bg-transparent rounded-r-md border border-red-500 hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2 focus:ring-red-500 focus:bg-red-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                            </button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>

    export default {
        mounted(){
            if(localStorage.access_token){
                console.log(localStorage.access_token);
            };
        },
        data () {
            return {
                products: []
            }
        },
        computed: {
            user:{
                get(){
                    console.log(this);                    
                    return this.$store.state.currentUser.user;
                }
            }
        },
        methods:{
            getProducts(){                
                axios.get('/api/products')
                .then(response => this.products = response.data)
                .catch();
            },
            deleteProduct(id){                
                axios.delete('/api/products/'+id, { headers: {Authorization: 'Bearer ' + localStorage.access_token } })
                .then(response => {                     
                    console.log(response);
                    this.$router.push('/admin/products');                     
                    this.$toasted.show('Product deleted succesfully');
                    this.getProducts();
                })
                .catch(error => { console.log(error.response) });
            }
        },
        created(){
            this.getProducts();
        }
    }
</script>
