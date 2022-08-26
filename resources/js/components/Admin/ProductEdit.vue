<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white mt-20">
        
        <p class="text-left">

            <router-link to="/admin/products"  type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-blue-900 bg-transparent border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-900 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                All products
            </router-link>
        </p>

        <h1 class="text-3xl text-center mt-6">Edit product</h1>

        
        <form class="mt-4" method="POST" v-on:submit.prevent="editProduct()">
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="product.name"
                placeholder="Product Name" name="name"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="product.slug"
                placeholder="Product Slug" name="slug"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="number" v-model="product.price"
                placeholder="Product Price" name="price"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="product.description"
                placeholder="Product Description" name="description"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>

            <button type="submit" class="bg-green-500 w-full text-white py-3">Edit</button>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                id: this.$route.params.id,
                product: []
            }
        },
        created(){
            axios.get('/api/products/'+this.id+'/edit',{ headers: {Authorization: 'Bearer ' + localStorage.access_token } })
            .then(response => this.product = response.data)
            .catch();
        },
        methods:{
            editProduct(){
                axios.put('/api/products/'+this.id, { name:this.product.name, slug:this.product.slug, price:this.product.price, description:this.product.description, }, { headers: {Authorization: 'Bearer ' + localStorage.access_token } })
                .then(response => {                     
                    console.log(response);
                    this.name = '';
                    this.slug = '';
                    this.price = '';
                    this.description = '';
                    this.$router.push('/admin/products');                     
                    this.$toasted.show('Product edited successfully');
                })
                .catch(error => { console.log(error.response) });

            }
        }
    }
</script>
